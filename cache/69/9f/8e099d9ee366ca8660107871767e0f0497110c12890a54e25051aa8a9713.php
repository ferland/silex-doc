<?php

/* shared/_header.twig */
class __TwigTemplate_699f8e099d9ee366ca8660107871767e0f0497110c12890a54e25051aa8a9713 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
    <title>Boilerplate ";
        // line 15
        if (array_key_exists("title", $context)) {
            echo "- ";
            echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        }
        echo "</title>
    ";
        // line 16
        if (((isset($context["env"]) ? $context["env"] : null) == "production")) {
            // line 17
            echo "      <link rel=\"stylesheet\" href=\"public/css/bootstrap.min.css\" />
      <link rel=\"stylesheet\" href=\"public/css/creditcard.min.css\" />
    ";
        } else {
            // line 20
            echo "      <link rel=\"stylesheet\" href=\"public/css/bootstrap.css\" />
      <link rel=\"stylesheet\" href=\"public/css/creditcard.css\" />
    ";
        }
        // line 23
        echo "</head>
<body>
  <!-- Static navbar -->
  <div class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
    <div class=\"container\">
      <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
          <span class=\"sr-only\">Toggle navigation</span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
        </button>
        <a class=\"navbar-brand\" href=\"#\">Project name</a>
      </div>
      <div class=\"navbar-collapse collapse\">
        <ul class=\"nav navbar-nav\">
          <li class=\"active\"><a href=\"#\">Home</a></li>
          <li><a href=\"#about\">About</a></li>
          <li><a href=\"#contact\">Contact</a></li>
          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Dropdown <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"#\">Action</a></li>
              <li><a href=\"#\">Another action</a></li>
              <li><a href=\"#\">Something else here</a></li>
              <li class=\"divider\"></li>
              <li class=\"dropdown-header\">Nav header</li>
              <li><a href=\"#\">Separated link</a></li>
              <li><a href=\"#\">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"../navbar/\">Default</a></li>
          <li class=\"active\"><a href=\"./\">Static top</a></li>
          <li><a href=\"../navbar-fixed-top/\">Fixed top</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>


   <div class=\"container\">
    <!-- Main component for a primary marketing message or call to action -->
    <div class=\"jumbotron\">
";
    }

    public function getTemplateName()
    {
        return "shared/_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 23,  49 => 20,  44 => 17,  42 => 16,  35 => 15,  19 => 1,  37 => 7,  32 => 5,  29 => 4,  26 => 3,  34 => 3,  30 => 5,  27 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }
}
