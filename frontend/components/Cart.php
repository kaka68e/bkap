<?php 

namespace frontend\components;

use Yii;

/**
* 
*/
class Cart
{
	/**
	* Phương thức thêm vào giỏ hàng
	*/
	public function add($data, $quantity = 1)
	{
		$session = Yii::$app->session;
		$cart = $session['cart'];
		if (isset($cart[$data->product_id])) {
			$quantity = $cart[$data->product_id]->quantity_user + 1;
		}
		
		$cart[$data->product_id] = $data;
		$cart[$data->product_id]->quantity_user = $quantity;
		$session['cart'] = $cart;
	}
	/**
	* Xóa 1 sản phẩm
	*/
	public function remove($id)
	{
		$session = Yii::$app->session;
		$cart = $session['cart'];
		if (isset($cart[$id])) {
			unset($cart[$id]);
		}
		$session['cart'] = $cart;
	}

	/**
	* Xóa toàn bộ sản phẩm
	*/
	public function removeAll()
	{
		$session = Yii::$app->session;
		unset($session['cart']);
	}
	/**
	* Cập nhật số lượng sản phẩm
	*/
	public function update($id,$quantity_user)
	{
		$session = Yii::$app->session;
		$cart = $session['cart'];
		$cart[$id]->quantity_user = $quantity_user;
		$session['cart'] = $cart;
	}


	/**
	* Tính tổng tiền phải trả của các sản phẩm
	*/
	public function getSumCost()
	{
		$totalCost = 0;
		$session = Yii::$app->session;
		$cart = $session['cart'];
		if ($cart) {
			foreach ($cart as $item) {
				$totalCost += $item->quantity_user * $item->price_real;
			}
			return $totalCost;
		}
		return false;
	}

	/**
	* Tính tổng số lượng item sản phẩm
	*/
	public function getTotalItem()
	{
		$totalItem = 0;
		$session = Yii::$app->session;
		$cart = $session['cart'];
		if ($cart) {
			foreach ($cart as $item) {
				$totalItem += $item->quantity_user;
			}
			return $totalItem;
		}
		return false;
	}
}

?>