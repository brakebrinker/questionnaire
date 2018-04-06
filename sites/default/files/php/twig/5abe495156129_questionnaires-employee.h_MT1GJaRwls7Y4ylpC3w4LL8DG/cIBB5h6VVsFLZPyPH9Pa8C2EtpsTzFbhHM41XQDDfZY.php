<?php

/* modules/custom/questionnaire_lists/templates/questionnaires-employee.html.twig */
class __TwigTemplate_030db79abbcd852c965f3f348c091fdc88386af8c6c787ceda798330909040dc extends Twig_Template
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
        $tags = array("if" => 1, "for" => 20);
        $filters = array("date" => 43);
        $functions = array("path" => 3);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'for'),
                array('date'),
                array('path')
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

        // line 1
        if ($this->getAttribute(($context["teamlead"] ?? null), "id", array())) {
            // line 2
            echo "    <span>Ваш тимлид: </span>
    <a href=\"";
            // line 3
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("entity.user.canonical", array("user" => $this->getAttribute(($context["teamlead"] ?? null), "id", array()))), "html", null, true));
            echo "\" rel=\"nofollow\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["teamlead"] ?? null), "getDisplayName", array(), "method"), "html", null, true));
            echo "</a>
";
        }
        // line 6
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
            <th>Имя тимлида</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["submissions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["submission"]) {
            // line 21
            echo "            <tr>
                <td>
                    ";
            // line 23
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "sid", array(), "array"), "html", null, true));
            echo "
                </td>
                <td>
                    ";
            // line 26
            if ($this->getAttribute($context["submission"], "locked", array())) {
                // line 27
                echo "                        <i class=\"fa fa-lock\" aria-hidden=\"true\"></i>
                    ";
            } else {
                // line 29
                echo "                        <i class=\"fa fa-unlock\" aria-hidden=\"true\"></i>
                    ";
            }
            // line 31
            echo "                </td>
                <td>
                    <a href=\"";
            // line 33
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "view_url", array()), "html", null, true));
            echo "/submissions/";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "sid", array()), "html", null, true));
            echo "\"><i class=\"fa fa-file-o\" aria-hidden=\"true\"></i></a>
                </td>
                <td>
                    ";
            // line 36
            if ($this->getAttribute($context["submission"], "locked", array())) {
                // line 37
                echo "                        <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>
                    ";
            } else {
                // line 39
                echo "                        <a href=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "update_url", array()), "html", null, true));
                echo "\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a>
                    ";
            }
            // line 41
            echo "                </td>
                <td>
                    ";
            // line 43
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["submission"], "created", array()), "d.m.Y H:i"), "html", null, true));
            echo "
                </td>
                <td>
                    ";
            // line 46
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["submission"], "changed", array()), "d.m.Y H:i"), "html", null, true));
            echo "
                </td>
                <td>
                    ";
            // line 49
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["submission"], "name_teamlead", array()), "html", null, true));
            echo "
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/questionnaire_lists/templates/questionnaires-employee.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 53,  135 => 49,  129 => 46,  123 => 43,  119 => 41,  113 => 39,  109 => 37,  107 => 36,  99 => 33,  95 => 31,  91 => 29,  87 => 27,  85 => 26,  79 => 23,  75 => 21,  71 => 20,  55 => 6,  48 => 3,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/questionnaire_lists/templates/questionnaires-employee.html.twig", "/home/ITRANSITION.CORP/m.pevnev/projects/www/questionnaire/modules/custom/questionnaire_lists/templates/questionnaires-employee.html.twig");
    }
}
