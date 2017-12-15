<?php

//require('connect_db.php');

class Products
{
	private $bdd;
	private $name;
	private $price;
	private $category_id;
	private $cat_name;
	private $file;

	public function __construct($bdd, $name, $price, $cat_name, $file)
	{
		$this->bdd = $bdd;
		$this->name = $name;
		$this->price = $price;
		$this->cat_name = $cat_name;
		$this->file = $file;
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_price()
	{
		return $this->price;
	}

	public function get_category_id()
	{
		return $this->category_id;
	}

	public function get_cat_name()
	{
		return $this->cat_name;
	}

	public function checkExist()
	{
		$errors = [];

		// check name
		$sql = 'SELECT EXISTS (SELECT * FROM products WHERE name = :name) AS name_exists';
		$result = $this->bdd->prepare($sql);
		$data = array('name' => $this->name);

        $result->execute($data);

        $req = $result->fetch();

        if ($req["name_exists"])
        {
        	$errors["name"] = "This product already exists";
        }

        return $errors;
	}

	public function add_Products()
	{
		if (count($this->checkExist($this->bdd, $this->name)) == 0)
		{	
			//Requête pour récupérer l'id
			$sql_2 = 'SELECT id FROM categories WHERE name = :name';
			$result_2 = $this->bdd->prepare($sql_2);

			$data_2 = array(
			'name' => $this->cat_name
			);
			$result_2->execute($data_2);

			$cat_id = $result_2->fetch(); 


			//Requête pour ajouter un produit
			$sql = 'INSERT INTO products (name, price, category_id, cover) VALUES (:name, :price, :category_id, :cover)';
			$result = $this->bdd->prepare($sql);

			$data = array(
                'name' => $this->name,
                'price' => $this->price,
                'category_id' => $cat_id['id'],
                'cover' => 'images/' . $this->file
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

		//Requête pour récupérer l'id
		$sql_2 = 'SELECT id FROM categories WHERE name = :name';
		$result_2 = $this->bdd->prepare($sql_2);

		$data_2 = array(
		'name' => $this->cat_name
		);
		$result_2->execute($data_2);

		$cat_id = $result_2->fetch(); 

		$sql = 'UPDATE products SET name = :name, price = :price, category_id = :category_id, cover = :cover WHERE id =' . $id;

		$result = $this->bdd->prepare($sql);

		$data = array(

            'name' => $this->name,
            'price' => $this->price,
            'category_id' => $cat_id['id'],
            'cover' => 'images/' . $this->file 
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
		$sql = 'DELETE FROM products WHERE name = :name';
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
