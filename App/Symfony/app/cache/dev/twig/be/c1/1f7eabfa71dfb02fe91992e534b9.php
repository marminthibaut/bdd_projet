<?php

/* ProjetBDDThesaurusBundle:Default:index.html.twig */
class __TwigTemplate_bec11f7eabfa71dfb02fe91992e534b9 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<p> ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'message'), "html");
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "ProjetBDDThesaurusBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
