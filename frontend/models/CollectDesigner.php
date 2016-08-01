<?php
/*
 * 收藏设计师
 */
namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

Class CollectDesigner extends ActiveRecord{
	private $_field = null;

	const STATUS_OK = 1;
	const STATUS_DELETE = 2;

	protected $_name = '';
	
	public function __construct(){
		parent::__construct();
		$this->_name = 'zy_collect_designer';
		$this->_field = array(
			'collect_id','user_id','designer_id','status','service_times','create_time','update_time',
		);
	}
	
	public static function tableName(){
		return 'zy_collect_designer';
	}

	/*根据user_id取得designer_id(检查是否收藏)*/
	
	public function getCollectDesignerById($userId){
		if(empty($userId)){
			return false;
		}
		$sql = "SELECT DISTINCT designer_id FROM $this->_name WHERE user_id=$userId AND status=1 GROUP BY designer_id";
		$ret = Yii::$app->db->createCommand($sql)->queryAll();

		//$ret = $this->findBySql("SELECT DISTINCT designer_id FROM {$this->_name} WHERE user_id=$userId AND status=1 GROUP BY designer_id");
		//$ret = $this->findAll(['user_id' =>$userId,'status' => 1]);
		return $ret;
	}

	public function collectDesigner($data){
		if(empty($data) || !is_array($data)){
			return false;
		}
		$updateField = array_intersect($this->_field,array_keys($data));
		foreach($updateField as $k => $v){
			$this->$v = $data[$v];
		}

		$this->save();
	}

	public function unCollectDesigner($set,$where){
		if(empty($set) || !is_array($set)){
			return false;
		}

		return $this->updateAll($set,$where);
	}
}
