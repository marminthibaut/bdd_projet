<?php

/* ProjetBDDThesaurusBundle:Terme:show.html.twig */
class __TwigTemplate_555ca29ea77cb47d9ef0470334d3544f extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Terme</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>
            <td>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Libelle</th>
            <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "libelle", array(), "any", false), "html");
        echo "</td>
        </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("terme"), "html");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("terme_edit", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\">
            Edit
        </a>
    </li>
    <li>
        <form action=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("terme_delete", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\" method=\"post\">
            ";
        // line 29
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, 'delete_form'));
        echo "
            <button type=\"submit\">Delete</button>
        </form>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "ProjetBDDThesaurusBundle:Terme:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
