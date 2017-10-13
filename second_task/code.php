
class Item{
	private $date;
	private $type;
	private $res;
	public function __construct( $date, $type, $res) {
		$this->date = $date;
		$this->type = $type;
		$this->res = $res;
	}

	public function getDate(){
		return $this->date;
	}
	public function getType(){
		return $this->type;
	}

	public function getResult(){
		return $this->res;
	}
}

class Cache
{
    private $cache;
    /**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    private static $instance = null;
    
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            self::$instance = new self();
        }

        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    private function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

   public function tryGetCachedResult($date, $type){
	foreach($this->cache as $item) {
    		if ($date == $item->getDate() && 
			$type == $item->getType()) {
        		return $item->getResult();
       			
    		}
	}
	return null;
   }

   public function putInCache($date, $type, $res){
	$item = new Item($date, $type, $res);
	
	$this->cache[] = item; // push to array
   }
}


function($date, $type) {
    $cache = Singleton::getInstance(); 
    $ans = $cache->tryGetCachedResult($date, $type);
    if ($ans != null){
	return $ans;
    }

    $userId = Yii::$app->user->id;
    $dataList = SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
    $result = [];

    if (!empty($dataList)) {
        foreach ($dataList as $dataItem) {
            $result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
        }
    }
    $cache->putInCache($date, $type, $result);
    return $result;
}


