<?php

/* modules/questionnaire_lists/templates/questionnaires-teamlead.html.twig */
class __TwigTemplate_ca70cb5c70cccb3e3faac5b9556aa14744876b2a5476dea939d607ff101d8a7e extends Twig_Template
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
        $tags = array("for" => 16, "if" => 22);
        $filters = array("date" => 39);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for', 'if'),
                array('date'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 2
        echo "<div class=\"table-responsive\">
    <table class=\"table table-hover table-striped\">
        <thead>
        <tr>
            <th>ID</th>
            <th></th>
            <th></th>
            <th></th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th>Имя сотрудника</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["submissions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["submission"]) {
            // line 17
            echo "            <tr>
                <td>
                    ";
            // line 19
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "sid", array()), "html", null, true));
            echo "
                </td>
                <td>
                    ";
            // line 22
            if ($this->getAttribute($context["submission"], "locked", array())) {
                // line 23
                echo "                        <i class=\"fa fa-lock\" aria-hidden=\"true\"></i>
                    ";
            } else {
                // line 25
                echo "                        <i class=\"fa fa-unlock\" aria-hidden=\"true\"></i>
                    ";
            }
            // line 27
            echo "                </td>
                <td>
                    <a href=\"";
            // line 29
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "view_url", array()), "html", null, true));
            echo "/submissions/";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "sid", array()), "html", null, true));
            echo "\"><i class=\"fa fa-file-o\" aria-hidden=\"true\"></i></a>
                </td>
                <td>
                    ";
            // line 32
            if ($this->getAttribute($context["submission"], "locked", array())) {
                // line 33
                echo "                        <span><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></span>
                    ";
            } else {
                // line 35
                echo "                        <a href=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "update_url", array()), "html", null, true));
                echo "\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a>
                    ";
            }
            // line 37
            echo "                </td>
                <td>
                    ";
            // line 39
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["submission"], "created", array()), "d.m.Y H:i"), "html", null, true));
            echo "
                </td>
                <td>
                    ";
            // line 42
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["submission"], "changed", array()), "d.m.Y H:i"), "html", null, true));
            echo "
                </td>
                <td>
                    ";
            // line 45
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["submission"], "entity_employee", array()), "getDisplayName", array(), "method"), "html", null, true));
            echo "
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/questionnaire_lists/templates/questionnaires-teamlead.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 49,  123 => 45,  117 => 42,  111 => 39,  107 => 37,  101 => 35,  97 => 33,  95 => 32,  87 => 29,  83 => 27,  79 => 25,  75 => 23,  73 => 22,  67 => 19,  63 => 17,  59 => 16,  43 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/questionnaire_lists/templates/questionnaires-teamlead.html.twig", "/home/ITRANSITION.CORP/m.pevnev/projects/www/questionnaire/modules/questionnaire_lists/templates/questionnaires-teamlead.html.twig");
    }
}
