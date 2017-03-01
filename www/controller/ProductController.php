<?php 
	
	//require_once ROOT.'/model/Category.php';
	//require_once ROOT.'/model/Product.php';
	class ProductController
	{
		/*Список всех товаров на главной странице*/
		public function actionList()
		{
			$result_category=Category::getCategory();
			$result_product=Product::getAllProduct(9);		
			require_once (ROOT.'/view/index.php');
		}
		/*список товаров по категориям*/
		public function actionView($category=null)
		{
			if($category){
				$result_category_one=Product::getAllCategoryProduct($category, 6);
				$result_category=Category::getCategory();
				$result_product=Product::getAllProduct(6);
				require_once (ROOT.'/view/products.php');
			}
		}
		/*описание одного товара по id*/
		public function actionSingle($id=null)
		{
				$result_single_one=Product::getOneProductFromCategory($id);
				$result_category=Category::getCategory();
				$result_product=Product::getAllProduct(3);
				require_once (ROOT.'/view/productdetail.php');
		}
	}
	
 ?>