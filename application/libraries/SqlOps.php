<?php

/*
 * Used for generic sql operations
 */
interface SqlOps{
	
	public function insert($object);
	public function update($object);
	public function delete($id);
	
}

?>