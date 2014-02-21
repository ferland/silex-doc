<?php

/* shared/_footer.twig */
class __TwigTemplate_e541199c3e2921e632737d05e0906fad39ede505432b1f38165b38dcdd90870b extends Twig_Template
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
        echo "    </div>
  </div> <!-- /container -->

  <footer>
      <p>&copy; Company ";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "</p>
  </footer>

  <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>
  <script>window.jQuery || document.write('<script src=\"public/js/jquery.1.10.2.min.js\"><\\/script>');</script>

  ";
        // line 11
        if (((isset($context["env"]) ? $context["env"] : null) == "production")) {
            // line 12
            echo "    <script src=\"public/js/bootstrap.min.js\"></script>
    <script src=\"public/js/apps.min.js\"></script>
    <script>
      (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
      (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
      l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-XXXXXXXX-XX');
      ga('send', 'pageview');
    </script>
  ";
        } else {
            // line 23
            echo "    <script src=\"public/js/bootstrap.js\"></script>
    <script src=\"public/js/apps.js\"></script>
  ";
        }
        // line 26
        echo "</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "shared/_footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 12,  54 => 26,  49 => 23,  44 => 17,  42 => 16,  35 => 15,  19 => 1,  37 => 7,  32 => 5,  29 => 4,  26 => 3,  34 => 11,  30 => 5,  27 => 4,  25 => 5,  22 => 2,  20 => 1,);
    }
}
