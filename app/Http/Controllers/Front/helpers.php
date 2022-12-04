<?php 
use App\Model\Category;

function category()
{
	$cat =  Category::select('*')->where('parent', 0)->get();
	return $cat;
}

function subcategory($id)
{
	$subcat =  Category::select('*')->where('parent', $id)->get();
	return $subcat;
}
