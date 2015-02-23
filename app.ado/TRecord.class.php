<?

	abstract class TRecord{
	
		protected $data;
		
		public function  __construct($id = NULL){
		
			if ($id){
				$object = $this->load($id);
				
				if ($object){
					$this->fromArray($object->toArray());
				}
			}
		
		}
		
		public function __clone(){
		
			unset($this->id);
		
		}
		
		public function __set($prop, $value){
		
			if (method_exists($this, 'set_'.$prop)){
				call_user_func(array($this, 'set_'.$prop), $value);
			}
			else{
			
				if($value == NULL){
					unset($this->data[$prop]);
				}
				else{
					$this->data[$prop] = $value;
				}
			}
		
		}
		
		public function __get($prop){
		
			if (method_exists($this, 'get_'.$prop)){
				return call_user_func(array($this, 'get_'.$prop));
			}
			else{
			
				if(isset($this->data[$prop])){
					return $this->data[$prop];
				}

			}			
		
		}
		
		private function getEntity(){
		
			$class = get_class($this);
			return constant("{$class}::TABLENAME");
		
		}
		
		public function fromArray($data){
		
			$this->data = $data;
		
		}
		
		public function toArray(){
		
			return $this->data;
		
		}
		
		public function store(){
		
			if (empty($this->data['id']) or (!$this->load($this->id))) {
				if (empty($this->data['id'])) {
					$this->id = $this->getLast() +1;
				}
				
				// cria instruчуo SQL
				$sql = new TSqlInsert;
				$sql->setEntity($this->getEntity());
				// percorre dados do objeto
				foreach ( $this->data as $key => $value ){
					// passa os dados do objeto para o SQL
					$sql->setRowData($key, $this->$key);
				}
			}
			else{
				// cria instruчуo UPDATE
				$sql = new TSqlUpdate;
				$sql->setEntity($this->getEntity());
				
				$criteria = new TCriteria;
				$criteria->add(new TFilter('id', ' = ', $this->id));
				$sql->setCriteria($criteria);
				// percorre dados do objeto
				foreach ( $this->data as $key => $value ){
					if ($key !== 'id') {
						// passa os dados do objeto para o SQL
						$sql->setRowData($key, $this->$key);
					}
				}				
			}
			
			if ( $conn = TTransaction::get() ) {
				TTransaction::log($sql->getInstruction());
				$result = $conn->exec($sql->getInstruction());
				return $result;
			}
			else{
				throw new Exception('Nуo hс transaчуo ativa');
			}
		
		}
		
		public function load($id){
		
			// cria instruчуo SQL
			$sql = new TSqlSelect;
			$sql->setEntity($this->getEntity());
			$sql->addColumn('*');
			
			$criteria = new TCriteria;
			$criteria->add(new TFilter('id', '=', $id));
			$sql->setCriteria($criteria);
			
			if ( $conn = TTransaction::get() ) {
				TTransaction::log($sql->getInstruction());
				$result = $conn->query($sql->getInstruction());
				if ( $result ){
					$object = $result->fetchObject(get_class($this));
				}
				return $object;
			}
			else{
				throw new Exception('Nуo hс transaчуo ativa');
			}
		}
		
		public function delete($id = NULL){
		
			$id = $id ? $id : $this->id;
			
			// cria instruчуo SQL
			$sql = new TSqlDelete;
			$sql->setEntity($this->getEntity());
			
			$criteria = new TCriteria;
			$criteria->add(new TFilter('id', '=', $id));
			$sql->setCriteria($criteria);	

			if ( $conn = TTransaction::get() ) {
				TTransaction::log($sql->getInstruction());
				$result = $conn->exec($sql->getInstruction());

				return $result;
			}
			else{
				throw new Exception('Nуo hс transaчуo ativa');
			}			
		
		}
		
		private function getLast(){
		
			if ( $conn = TTransaction::get() ) {
			
				// cria instruчуo SQL
				$sql = new TSqlSelect;
				$sql->addColumn('max(ID) as ID');
				$sql->setEntity($this->getEntity());			
			
				TTransaction::log($sql->getInstruction());
				$result = $conn->query($sql->getInstruction());
				$row = $result->fetch();
				
				return $row[0];
			}
			else{
				throw new Exception('Nуo hс transaчуo ativa');
			}			
		
		}
			
	}

?>