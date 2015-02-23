<?

	final class TRepository{
	
		private $class;
	
		function __construct($class){
			
			$this->class = $class;
			
		}
		
		function load(TCriteria $criteria){
		
			$sql = new TSqlSelect;
			$sql->addColumn('*');
			$sql->setEntity(constant($this->class.'::TABLENAME'));
			$sql->setCriteria($criteria);
			
			if ($conn = TTransaction::get()) {
				TTransaction::log($sql->getInstruction());
				
				$result = $conn->query($sql->getInstruction());
				$results= array();
				
				if ($result){
					while($row = $result->fetchObject($this->class)){
						$results[] = $row;
					}
				}
				
				return $results;
			}
			else {
				throw new Exception('Nгo hб transaзгo ativa!');
			}
		
		}
		
		/*
		 * mйtodo delete()
		 * Exclui um conjunto de objetos (collection) da base de dados
		 * atravйs de um critйrio de seleзгo
		 * @param $crteria = objeto do tipo TCriteria
		 */
		function delete(TCriteria $criteria){
		
			$sql = new TSqlDelete;
			$sql->setEntity(constant($this->class.'::TABLENAME'));
			$sql->setCriteria($criteria);
			
			if ($conn = TTransaction::get()) {
				TTransaction::log($sql->getInstruction());
				
				$result = $conn->exec($sql->getInstruction());
				
				return $result;
			}
			else {
				throw new Exception('Nгo hб transaзгo ativa!');
			}			
		
		}
		
		/*
		 * mйtodo count()
		 */
		function count(TCriteria $criteria){
		
			$sql = new TSqlSelect;
			$sql->addColumn(' count(*) ');
			$sql->setEntity(constant($this->class.'::TABLENAME'));
			$sql->setCriteria($criteria);
			
			if ($conn = TTransaction::get()) {
				TTransaction::log($sql->getInstruction());
				
				$result = $conn->query($sql->getInstruction());
				
				if ($result){
				
					$row = $result->fetch();
	
				}
				
				return $row[0];
			}
			else {
				throw new Exception('Nгo hб transaзгo ativa!');
			}		
		
		}
	}

?>