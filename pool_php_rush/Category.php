<?php

class Category
{
	private $bdd;
	private $name;
	private $parent_id;

	public function __construct($bdd, $name, $parent_id = null)
	{
		$this->bdd = $bdd;
		$this->name = $name;
		$this->parent_id = $parent_id;
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_parent_id()
	{
		return $this->parent_id;
	}

		public function checkExist()
	{
		$errors = [];

		// check name
		$sql = 'SELECT EXISTS (SELECT * FROM categories WHERE name = :name) AS name_exists';
		$result = $this->bdd->prepare($sql);
		$data = array('name' => $this->name);

        $result->execute($data);

        $req = $result->fetch();

        if ($req["name_exists"])
        {
        	$errors["name"] = "This category already exists";
        }

        return $errors;
	}

	public function add_Category()
	{
		if (count($this->checkExist($this->bdd, $this->name)) == 0)
		{
			$sql = 'INSERT INTO categories (name, parent_id) VALUES (:name, :parent_id)';
			$result = $this->bdd->prepare($sql);

			$data = array(
                'name' => $this->name,
                'parent_id' => $this->parent_id
                );

			if ($result->execute($data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}

	}

public function update($id)
	{
		$sql = 'UPDATE categories SET name = :name WHERE id =' . $id;

		$result = $this->bdd->prepare($sql);

		$data = array(

            'name' => $this->name,
            );

		if ($result->execute($data))
			{
				return true;
			}

			else
			{
				return false;
			}
	}

	public function delete()
	{
		$sql = 'DELETE FROM categories WHERE name = :name';
		$result = $this->bdd->prepare($sql);

		$data = array(
            'name' => $this->name
            );

		if ($result->execute($data))
			{
				return true;
			}
		else
			{
				return false;
			}
	}


}

?>