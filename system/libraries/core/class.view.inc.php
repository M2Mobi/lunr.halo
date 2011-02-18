<?php

/**
 * View class used by the Website
 * @author M2Mobi, Heinz Wiesinger
 */
abstract class View
{

    /**
     * Shared data variable
     * @var array
     */
    protected $data;

    /**
     * Reference to the Localization provider
     * @var L10nProvider
     */
    protected $l10n;

    /**
     * Reference to the Controller who instantiated the View
     * @var Controller
     */
    protected $controller;

    /**
     * Constructor
     * @param Object $controller Reference to the controller
     */
    public function __construct(&$controller)
    {
        $this->data = array();
        $this->controller = &$controller;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        unset($this->data);
    }

    /**
     * Build the actual display and print it
     */
    abstract public function print_page();

    /**
     * Add data to the view, which is then accessible from within
     * the print_page() function.
     * @param Mixed $key Identifier for the data
     * @param Mixed $value The data
     * @return void
     */
    public function add_data($key, &$value)
    {
        $this->data[$key] = &$value;
    }

    /**
     * Set the localization provider that should be used by the view
     * @param L10nProvider $provider Reference to the localization provider
     * @return void
     */
    public function set_l10n_provider(&$provider)
    {
        $this->l10n = &$provider;
    }

    /**
     * Return base_url or attach given path to base_url
     * @param String $path Path that should be attached to base_url (optional)
     * @return String $return base_url (+ the given path, if given)
     */
    protected function base_url($path = "")
    {
        return $this->config['base_url'] . $path;
    }

    /**
     * Return path to statics or attach given path to it
     * @param String $path Path that should be attached to the statics path (optional)
     * @return String $return path to statics (+ the given path, if given)
     */
    protected function statics($path = "")
    {
        return $this->base_url("statics/" . $path);
    }

    /**
     * Return an alternating (eg. odd/even) CSS class name
     * @param String $basename CSS base class name (without ending underscore or suffix)
     * @param Integer $alternation_hint Integer counter indicating the alternation state
     * @param String $suffix An alternative suffix if you don't want odd/even
     * @return String $return The constructed CSS class name
     */
    protected function css_alternate($basename, $alternation_hint, $suffix = "")
    {
        if ($suffix == "")
        {
            if ( $alternation_hint % 2 == 0 )
            {
                $basename . '_even';
            }
            else
            {
               $basename . '_odd';
            }
        }
        else
        {
            $basename . '_' . $suffix;
        }
        return $basename;
    }

}

?>
