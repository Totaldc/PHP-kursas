<?php
namespace Core\Abstracts\Views;




class Form extends \Core\Abstracts\Views\Form
{
    public function render(string $template_path = ROOT . '/core/templates/form.tpl.php'): string
    {
        return parent::render($template_path);
    
    }
    /**
     * Determines which button was pressed by reading "action"
     * index in $_POST.
     * If $_POST is empty, or doesnt contain action, returns null
     *
     * @return string|null
     */
    static function getSubmitAction(): ?string
    {
        return $_POST['action'] ?? null;
    }
    /**
     * Checks if the form is submitted
     *
     * Gets submit action from $_POST, and checks if form array
     * has a button with such index
     *
     * @return bool
     */
    public function isSubmitted(): bool
    {
        if ($this->data['buttons'])
        $this->getSubmitAction();
    }


    /**
     * Gets form subitted data
     * If $filtered = false, returns $_POST if not empty (or null)
     * If $filtered = true, returns filtered $_POST array
     * based on form array: $this->data
     *
     * DO NOT CALL any functions, it has to be full-code
     *
     * @param bool $filter
     * @return array|null
     */
    public function getSubmitData($filter = true): ?array
    {
        // TODO: Implement getSubmitData() method.
    }

    
    /**
     * Validates form based on $this->data
     * Does NOT call any callbacks, just returns the result
     * of the form
     *
     * Does not call function validate_form !!!,
     * implements all functionality inside
     *
     * @return bool
     */
    public function validate(): bool
    {
        // TODO: Implement validate() method.
    }
}