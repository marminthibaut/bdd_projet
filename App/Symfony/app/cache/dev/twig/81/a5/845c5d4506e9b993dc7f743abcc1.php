<?php

/* ProjetBDDThesaurusBundle:Terme:index.html.twig */
class __TwigTemplate_81a5845c5d4506e9b993dc7f743abcc1 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Terme list</h1>

<table class=\"records_list\">
    <thead>
        <tr>
            <th>Id</th>
            <th>Libelle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'entities'));
        foreach ($context['_seq'] as $context['_key'] => $context['entity']) {
            // line 13
            echo "        <tr>
            <td><a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("terme_show", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
            echo "</a></td>
            <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "libelle", array(), "any", false), "html");
            echo "</td>
            <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("terme_show", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
            echo "\">show</a>
                    </li>
                    <li>
                        <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("terme_edit", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
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
        // line 28
        echo "    </tbody>
</table>

<ul>
    <li>
        <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("terme_new"), "html");
        echo "\">
            Create a new entry
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "ProjetBDDThesaurusBundle:Terme:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
