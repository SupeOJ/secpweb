<?php

namespace Microweber\Providers;

use Microweber\Utils\Adapters\Cache\LaravelCache;

use Content;
use Sliderbar;
use DB;

/**
 * Content class is used to get and save content in the database.
 *
 * @package Content
 * @category Content
 * @desc  These functions will allow you to get and save content in the database.
 *
 */
class SliderbarManager
{


    public $app = null;

    /**
     *  Boolean that indicates the usage of cache while making queries
     *
     * @var $no_cache
     */
    public $no_cache = false;

    public $tables = array();

    function __construct($app = null)
    {
        if (!is_object($this->app)) {
            if (is_object($app)) {
                $this->app = $app;
            } else {
                $this->app = mw();
            }
        }
        $this->set_table_names();

    }

    /**
     * Sets the database table names to use by the class
     *
     * @param array|bool $tables
     */
    public function set_table_names($tables = false)
    {

        if (!isset($tables['sliderbar'])) {
            $tables['sliderbar'] = 'sliderbar';
        }
        $this->tables['sliderbar'] = $tables['sliderbar'];
    }

//根据id获取一组数据m
    public function sliderbar_item_get($id)
    {
        if (is_array($id)) {
            extract($id);
        }
        $table = $this->tables['sliderbar'];
        return db_get("one=1&limit=1&table=$table&id=$id");

    }

//根据id删除一组数据
    public function sliderbar_item_delete($id = false)
    {

        if (is_array($id)) {
            extract($id);
        }
        if (!isset($id) or $id == false or intval($id) == 0) {
            return false;
        }
        $table = $this->tables['sliderbar'];
        $this->app->database_manager->delete_by_id($table, intval($id), $field_name = 'id');
        $this->app->cache_manager->delete('sliderbar/global');
        return true;
    }

//获取所有启用符合条件数据
    public function get_sliderbar_items($params = false)
    {
        $table = $this->tables['sliderbar'];
        if (is_string($params)) {
            $params = parse_params($params);
        }
        $params['table'] = $table;
        $params['order_by'] = "position ASC";
        $params['no_limit'] = 1;
        return $this->app->database_manager->get($params);
    }



//构造树形结构数据
    private $formatList=[];
    private $icon = array('&nbsp;&nbsp;│', '&nbsp;&nbsp;├ ', '&nbsp;&nbsp;└ ');  //格式化的字符
    public function TreeList($pid = 0, $space = "") {
        //$childs = db_get("table=sliderbar&parent_id={$pid}");
        $childs =$this -> get_sliderbar_items("parent_id={$pid}");
//        下级分类的数组
//        如果没下级分类，结束递归
        if(count($childs)==0 || empty($childs)){
            return ;
        }
        $n = count($childs);
        $m = 1;
        for ($i = 0; $i < $n; $i++) {
            $pre = "";
            $pad = ""; 
            if ($n == $m) {
                $pre = $this->icon[2];
            } else {
                $pre =  $this->icon[1];
                $pad = $space ?  $this->icon[0] : "";
            }
            $childs[$i]['fullname'] = ($space ?  $space . $pre : "") . $childs[$i]['title'];
            $this->formatList[] = $childs[$i];
           //print_r($childs[$i]['id']);
           $this->TreeList($childs[$i]['id'] , $space . $pad .'&nbsp;&nbsp;'); //递归下一级分类
            $m++;
        } 
    }
//获取树形结构数据
    public function getTreeList($pid = 0, $space = ""){
        $this->TreeList($pid, $space);
        return $this->formatList;

    }

///添加编辑数据
    public function sliderbar_item_create($data_to_save){
        $id = $this->app->user_manager->is_admin();
   
        $table = $this->tables['sliderbar'];

        $data_to_save['table'] = $table;
        $data_to_save['item_type'] = 'menu_item';
        $data_to_save['is_active'] = '1';
		$url = $data_to_save['url'];
        if(!empty($data_to_save['code'])){
          $data_to_save = $this->app->database_manager->get_by_id($table, $data_to_save['id']);
		  $data_to_save['url'] = $url;
		}
        $save = $this->app->database_manager->save($table, $data_to_save);
        $this->app->cache_manager->delete('sliderbar/global');

        return $save;
    }

}

    
