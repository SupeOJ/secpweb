<?php

/*

type: layout

name: orgcharts

position: 1
 

*/

$dataJson = '{ "class": "go.GraphLinksModel",
  "nodeKeyProperty": "id",
  "linkKeyProperty": "id",
  "nodeDataArray": [ 
{"id":1, "loc":"84.1000000000001 91.20000000000002", "text":"网络管理组"},
{"id":3, "loc":"209.0000000000001 126", "text":"项目四组"},
{"id":5, "loc":"283 378.99999999999994", "text":"项目三组"},
{"id":7, "loc":"-17.250000000000085 397.70000000000005", "text":"项目一组"},
{"id":9, "loc":"-296.4000000000003 212.74999999999986", "text":"技术研发部\n"},
{"text":"电子商务中心", "id":11, "loc":"-662.5500000000001 204.75000000000003"},
{"text":"产品设计部", "id":13, "loc":"-344.4 40.94999999999999"},
{"text":"企划推广部", "id":15, "loc":"-363.30000000000007 384.3"}
 ],
  "linkDataArray": [ 
{"from":9, "to":7, "id":2, "points":[-223.4969971467484,274.3412813755082,-11.171405868912633,414.2668471464334]},
{"from":9, "to":1, "id":4, "points":[-218.93737326342833,240.04429031371393,85.95090084521871,139.56709263770708]},
{"from":9, "to":3, "id":6, "points":[-217.5586059544037,245.50225133031344,209.57250476600206,169.30645918747382]},
{"from":9, "to":5, "id":8, "points":[-218.44607719214568,263.31062116687644,284.39537004814264,405.7944995353354]},
{"from":11, "to":13, "id":10, "points":[-592.9614493820219,224.725132585356,-340.314132013327,94.6492860192952]},
{"from":11, "to":9, "id":12, "points":[-588.8916158203494,242.673979672178,-296.3827066576871,251.30732764260318]},
{"from":11, "to":15, "id":14, "points":[-594.125144317938,260.53979713016747,-358.050437077411,402.18462147448366]}
 ]}';

  $orgData = get_option('orgData',$params['id']);
  $orgData = $orgData == false ? $dataJson : $orgData;

    $layoutBackgound = get_option('layoutBackgound',$params['id']);
    $layoutBackgound = $layoutBackgound == false ? '#f7ffe0' : $layoutBackgound;

    $layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
    $layoutBackgoundOpacity = $layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;  

    $background =  'background:'. $layoutBackgound.';opacity:'.$layoutBackgoundOpacity ;
    $height = get_option('height',$params['id']);
    $height = $height ===false ? '600':$height;

    $circolor = get_option('circolor',$params['id']);
    $circolor = $circolor ===false ? '#ebf7ff':$circolor; 
    // $is_editiing = in_live_edit() ? 'true' : 'false';

?>


<script type="text/javascript">
mw.moduleJS("<?php print $config['url_to_module']; ?>/js/go.js");
</script>


<div class="sample" style="position: relative;">
  <div id="myDiagramDiv-<?php print $params['id']; ?>" style="width: 100%; height: <?php echo $height;?>px;<?php echo $background;?>"></div>
  <?php if(in_live_edit()): ?>  
  <button id="SaveButton-<?php print $params['id']; ?>" style="position:absolute;right:0;bottom:0;padding:10px;z-index: 2;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">保存</button>
  <?php endif; ?> 
</div>

<script>
  <?php $myDiagram = str_replace("-","_",$params['id']);?>
  function init() {

    var $ = go.GraphObject.make;  // for conciseness in defining templates

    myDiagram_<?php echo $myDiagram;?> =
      $(go.Diagram, "myDiagramDiv-<?php print $params['id']; ?>",  // must name or refer to the DIV HTML element
        {
          // start everything in the middle of the viewport
          initialContentAlignment: go.Spot.Center,
          // have mouse wheel events zoom in and out instead of scroll up and down
          "toolManager.mouseWheelBehavior": go.ToolManager.WheelZoom,
          // support double-click in background creating a new node
          "clickCreatingTool.archetypeNodeData": { text: "新节点" },
          "InitialLayoutCompleted": function(e) { 
            // showIncremental("InitialLayout");
          },
          "ModelChanged": function(e) {
            if (e.isTransactionFinished) {
              // this records each Transaction as a JSON-format string
              // showIncremental(myDiagram.model.toIncrementalJson(e));
            }
          },
          // enable undo & redo
          "undoManager.isEnabled": true
        });

    // when the document is modified, add a "*" to the title and enable the "Save" button
    myDiagram_<?php echo $myDiagram;?>.addDiagramListener("Modified", function(e) {
      var button = document.getElementById("SaveButton-<?php print $params['id']; ?>");
      if (button) button.disabled = !myDiagram_<?php echo $myDiagram;?>.isModified;
      var idx = document.title.indexOf("*");
      if (myDiagram_<?php echo $myDiagram;?>.isModified) {
        if (idx < 0) document.title += "*";
      } else {
        if (idx >= 0) document.title = document.title.substr(0, idx);
      }
    });

    // define the Node template
    myDiagram_<?php echo $myDiagram;?>.nodeTemplate =
      $(go.Node, "Auto",
        new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
        // define the node's outer shape, which will surround the TextBlock
        $(go.Shape, "Circle",
          {
            parameter1: 20,  // the corner has a large radius
            fill: $(go.Brush, "Linear", { 0: "<?php echo $circolor;?>", 1: "<?php echo $circolor;?>" }),
            stroke: "#ddd",
            portId: "",
            fromLinkable: true,
            fromLinkableSelfNode: true,
            fromLinkableDuplicates: true,
            toLinkable: true,
            toLinkableSelfNode: true,
            toLinkableDuplicates: true,
            cursor: "pointer"
          }),
        $(go.TextBlock,
          {
            font: "12pt helvetica, bold arial, sans-serif",
            editable: true  //圆内文字是否编辑
          },
          { margin: 1, maxSize: new go.Size(60, 60), textAlign: "center" },
          new go.Binding("text", "text").makeTwoWay())
      );

    // unlike the normal selection Adornment, this one includes a Button
    myDiagram_<?php echo $myDiagram;?>.nodeTemplate.selectionAdornmentTemplate =
      $(go.Adornment, "Spot",
        $(go.Panel, "Auto",
          $(go.Shape, { fill: null, stroke: "#ddd", strokeWidth: 1.5 }),
          $(go.Placeholder)  // this represents the selected Node
        ),
        // the button to create a "next" node, at the top-right corner
        $("Button",
          {
            alignment: go.Spot.TopRight,
            click: addNodeAndLink  // this function is defined below
          },
          $(go.Shape, "PlusLine", { desiredSize: new go.Size(6, 6) })
        ) // end button
      ); // end Adornment

    // clicking the button inserts a new node to the right of the selected node,
    // and adds a link to that new node
    function addNodeAndLink(e, obj) {
      var adorn = obj.part;
      e.handled = true;
      var diagram = adorn.diagram;
      diagram.startTransaction("Add State");

      // get the node data for which the user clicked the button
      var fromNode = adorn.adornedPart;
      var fromData = fromNode.data;
      // create a new "State" data object, positioned off to the right of the adorned Node
      var toData = { text: "新节点" };
      var p = fromNode.location.copy();
      p.x += 200;
      toData.loc = go.Point.stringify(p);  // the "loc" property is a string, not a Point object
      // add the new node data to the model
      var model = diagram.model;
      model.addNodeData(toData);

      // create a link data from the old node data to the new node data
      var linkdata = {
        from: model.getKeyForNodeData(fromData),  // or just: fromData.id
        to: model.getKeyForNodeData(toData),
        text: "连接"
      };
      // and add the link data to the model
      model.addLinkData(linkdata);

      // select the new Node
      var newnode = diagram.findNodeForData(toData);
      diagram.select(newnode);

      diagram.commitTransaction("Add State");

      // if the new node is off-screen, scroll the diagram to show the new node
      diagram.scrollToRect(newnode.actualBounds);
    }

    // replace the default Link template in the linkTemplateMap
    myDiagram_<?php echo $myDiagram;?>.linkTemplate =
      $(go.Link,  // the whole link panel
        {
          curve: go.Link.Bezier, adjusting: go.Link.Stretch,
          reshapable: true, relinkableFrom: true, relinkableTo: true
        },
        new go.Binding("points").makeTwoWay(),
        new go.Binding("curviness", "curviness"),
        $(go.Shape,  // the link shape
          { strokeWidth: 1 ,stroke:"#888" }),//线条粗细颜色
        $(go.Shape,  // the arrowhead
          { toArrow: "standard", stroke: "#888" }),
        $(go.Panel, "Auto",
          $(go.Shape,  // the label background, which becomes transparent around the edges
            {
              fill: $(go.Brush, "Radial",
                      { 0: "rgb(240, 240, 240)", 0.3: "rgb(240, 240, 240)", 1: "rgba(240, 240, 240, 0)" }),
              stroke: null
            }),
          $(go.TextBlock, "连接",  // the label text
            {
              textAlign: "center",
              font: "10pt helvetica, arial, sans-serif",
              stroke: "black",
              margin: 4,
              editable: true // editing the text automatically updates the model data
            },
            new go.Binding("text", "text").makeTwoWay())
        )
      );

    // read in the JSON-format data from the "mySavedModel" element
    load();
  }
  var initjson =<?php echo $orgData;?>;
  // Show the diagram's model in JSON format
  function save() {
   // document.getElementById("mySavedModel").value = myDiagram.model.toJson();
   //  myDiagram.isModified = false;
    var data = {};
    data.option_group = "<?php print $params['id'] ?>";
    data.option_key = "orgData";
    data.option_value = myDiagram_<?php echo $myDiagram;?>.model.toJson();
    $.post("<?php print api_url('save_option') ?>", data, function (resp) {
        mw.reload_module('#<?php print $params['id'] ?>');
    });
  }
  function load() {
    var model = go.Model.fromJson(<?php echo $orgData;?>);
    // establish GraphLinksModel functions:
    // node data id's are odd numbers
    model.makeUniqueKeyFunction = function(model, data) {
      var i = model.nodeDataArray.length * 2 + 1;
      while (model.findNodeDataForKey(i) !== null) i += 2;
      data.id = i;  // assume Model.nodeKeyProperty === "id"
      return i;
    };
    // link data id's are even numbers
    model.makeUniqueLinkKeyFunction = function(model, data) {
      var i = model.linkDataArray.length * 2 + 2;
      while (model.findLinkDataForKey(i) !== null) i += 2;
      data.id = i;  // assume GraphLinksModel.linkKeyProperty === "id"
      return i;
    };
    myDiagram_<?php echo $myDiagram;?>.model = model;

  }

init();
<?php if(in_live_edit()): ?>
document.getElementById("SaveButton-<?php print $params['id']; ?>").onclick=save;
<?php endif; ?> 
<?php if(!in_live_edit()): ?>
myDiagram_<?php echo $myDiagram;?>.isEnabled = false ;//禁用图表
<?php endif; ?> 
</script>