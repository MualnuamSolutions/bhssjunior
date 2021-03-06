<?php

class BaseController extends Controller
{
    public $current_route;
    public $logged_user;
    public $staffGroup;
    public $externalGroup;
    public $adminGroup;
    public $currentSession;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }

        $this->setUp();
    }

    protected function setUp()
    {
        $this->current_route = Route::getCurrentRoute()->getName();
        $this->logged_user = Sentry::getUser();
        $this->staffGroup = Sentry::findGroupByName('Staff');
        $this->externalGroup = Sentry::findGroupByName('External');
        $this->adminGroup = Sentry::findGroupByName('Admin');
        $this->currentSession = AcademicSession::currentSession();

        View::share('logged_user', $this->logged_user);
        View::share('current_route', $this->current_route);
        View::share('adminGroup', $this->adminGroup);
        View::share('staffGroup', $this->staffGroup);
        View::share('externalGroup', $this->externalGroup);
        View::share('currentSession', $this->currentSession);
    }

}
