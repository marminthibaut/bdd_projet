<?php

/* ProjetBDDThesaurusBundle:Concept:show.html.twig */
class __TwigTemplate_598b9d78d096a8d612d8817d170d7eb6 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Concept</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>
            <td>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
        echo "</td>
        </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("concept"), "html");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("concept_edit", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\">
            Edit
        </a>
    </li>
    <li>
        <form action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("concept_delete", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\" method=\"post\">
            ";
        // line 25
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
        return "ProjetBDDThesaurusBundle:Concept:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
