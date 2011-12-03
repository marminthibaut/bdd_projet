<?php

/* ProjetBDDThesaurusBundle:Concept:index.html.twig */
class __TwigTemplate_d4741ce3fa89862bf837f3f965831cca extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Concept list</h1>

<table class=\"records_list\">
    <thead>
        <tr>
            <th>Id</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'entities'));
        foreach ($context['_seq'] as $context['_key'] => $context['entity']) {
            // line 12
            echo "        <tr>
            <td><a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("concept_show", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
            echo "</a></td>
            <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("concept_show", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
            echo "\">show</a>
                    </li>
                    <li>
                        <a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("concept_edit", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
            echo "\">edit</a>
                    </li>
                </ul>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "    </tbody>
</table>

<ul>
    <li>
        <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("concept_new"), "html");
        echo "\">
            Create a new entry
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "ProjetBDDThesaurusBundle:Concept:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
