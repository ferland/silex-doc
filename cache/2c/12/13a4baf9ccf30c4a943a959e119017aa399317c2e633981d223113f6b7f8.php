<?php

/* layout/layout.twig */
class __TwigTemplate_2c1213a4baf9ccf30c4a943a959e119017aa399317c2e633981d223113f6b7f8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->env->loadTemplate("shared/_header.twig")->display($context);
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('content', $context, $blocks);
        // line 4
        echo "
";
        // line 5
        $this->env->loadTemplate("shared/_footer.twig")->display($context);
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 3,  30 => 5,  27 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }
}
