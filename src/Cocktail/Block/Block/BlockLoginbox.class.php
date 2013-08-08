<?php
/**
 * This file is part of PhpCocktail. PhpCocktail is free software: you can redistribute it and/or modify it under the
 * 		terms of the GNU Lesser General Public License as published by the Free Software Foundation, either version 3
 * 		of the License, or (at your option) any later version.
 * PhpCocktail is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * 		warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for
 * 		more details. You should have received a copy of the GNU Lesser General Public License along with PhpCocktail.
 * 		If not, see <http://www.gnu.org/licenses/>.
 * @copyright Copyright 2013 t
 */
// @todo do I need Cocktail\BlockLoginbox namespace? maybe for class or template overriding
namespace Cocktail\Block;

/**
 * Class BlockLoginboxLoginValidator
 *
 * @package Blog
 */
class BlockLoginboxLoginValidator extends \ModelValidator {

	protected static $_idFieldName;
	/**
	 * @var string the storetable will be used for validations like unique
	 */
	protected static $_storeTable = '';
	protected static $_fields = array (
		'login' => array(
			'type' => 'email',
		),
		'password' => array(
			'type' => 'password',
			'minLength' => 3,
		),
		'stayloggedin' => array(
			'type' => 'bool',
		),
	);
}

/**
 * Loginbox block module
 * @author t
 * @package Cocktail\Demo\Blog
 * @version 1.01
 * @todo implement modules/packages and move parent class
 */
class BlockLoginbox extends \BlockHmvc {

	protected $_template = 'Block/BlockLoginbox.html';

	/**
	 * use this to set the login form action
	 * @param string $loginFormAction
	 * @return \Blog\BlockLoginbox
	 */
	public function setLoginFormAction($loginFormAction) {
		$this->setViewData('loginFormAction', $loginFormAction);
		return $this;
	}

	protected function _before() {
		parent::_before();
		$this->WebUser = \Application::instance()->getUser();
	}

	/**
	 * in fact I don't have to do anything here
	 */
	public function actionAllIndex() {
	}

//	public function actionGetIndex() {}

	public function actionAllLogin() {
		$Auth = $this->_getAuthDriver();
		$Auth->check($this->Request);
		$User = $Auth->User;
		echop($User);
		return 'allLogin';
	}

	public function actionPostLogin() {

		$Input = BlockLoginboxLoginValidator::getFromRequest(null, \RequestHttp::REQUESTMETHOD_POST);
		$Input->validate();
		if (!$Input->isValid) {
			echop($this);
			die('invalid');
		}

		$Auth = \Auth::instance();
		$success = $Auth->driverLoginByLoginPassword($Input->login, $Input->password, $Input->stayloggedin);

		$ret = $success
			? \View::get('BlockLoginbox/BlockLoginboxLoggedin.html')
				->set('User', $Auth->driverGetUser())
			: \View::get('BlockLoginbox/BlockLoginbox.html');
		return $ret;
	}

}
