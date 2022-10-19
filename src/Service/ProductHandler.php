<?php

namespace App\Service;

class ProductHandler
{
	public function getTotalPrice(array $products)
	{
		$totalPrice = 0;
		foreach($products as $product){
			$price = $product['price'] ?: 0;
			$totalPrice += $price;
		}
		return $totalPrice;
	}

	private function isDessert($product)
	{
		return isset($product['type']) && $product['type'] == 'Dessert';
	}

	private function priceSortDESC($product_a, $product_b)
	{
		return $product_b['price'] <=> $product_a['price'];
	}

	public function getDesserts(array $products)
	{
		$products = usort($products, "priceSortDESC");
		$products = array_filter($products, "isDessert");
		
		return $products;
	}

	public function toUnixTime(array $products)
	{
		foreach($products as $product){
			if(isset($product['create_at'])){
				//without considering timezone.
				$product['create_at'] = strtotime($product['create_at']);
			}
		}

		return $products;
	}
}
