<?php
/**
 * Site Authentication component
 *
 * Manages user logins and permissions.
 *
 */

App::uses('Component', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
App::uses('Router', 'Routing');
App::uses('Security', 'Utility');
App::uses('Debugger', 'Utility');
App::uses('Hash', 'Utility');
App::uses('CakeSession', 'Model/Datasource');
App::uses('BaseAuthorize', 'Controller/Component/Auth');
App::uses('SiteBaseAuthenticate', 'Controller/Component/Auth');

/**
 * Authentication control component class
 *
 * Binds access control with user authentication and session management.
 *
 */
class SiteAuthComponent extends AuthComponent {

}
