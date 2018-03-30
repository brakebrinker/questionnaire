<?php

/* {# inline_template_start #}<div class="pdf-question"><strong>На каких проектах сотрудник единолично разрабатывал архитектуру модуля или подпроекта с явным определением целевых требований?</strong></div>
<div class="pdf-answer">{% if webform_submission_value_142 %}{{ webform_submission_value_142 }}{% else %} Не заполнено {% endif %}</div> */
class __TwigTemplate_a1a9415a3db6d6485bfd2eb10b06d91a4d62bc61631f0f6b84b1c357a7f0472f extends Twig_Template
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
        $tags = array("if" => 2);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array(),
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

        // line 1
        echo "<div class=\"pdf-question\"><strong>На каких проектах сотрудник единолично разрабатывал архитектуру модуля или подпроекта с явным определением целевых требований?</strong></div>
<div class=\"pdf-answer\">";
        // line 2
        if (($context["webform_submission_value_142"] ?? null)) {
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["webform_submission_value_142"] ?? null), "html", null, true));
        } else {
            echo " Не заполнено ";
        }
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div class=\"pdf-question\"><strong>На каких проектах сотрудник единолично разрабатывал архитектуру модуля или подпроекта с явным определением целевых требований?</strong></div>
<div class=\"pdf-answer\">{% if webform_submission_value_142 %}{{ webform_submission_value_142 }}{% else %} Не заполнено {% endif %}</div>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 2,  44 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "{# inline_template_start #}<div class=\"pdf-question\"><strong>На каких проектах сотрудник единолично разрабатывал архитектуру модуля или подпроекта с явным определением целевых требований?</strong></div>
<div class=\"pdf-answer\">{% if webform_submission_value_142 %}{{ webform_submission_value_142 }}{% else %} Не заполнено {% endif %}</div>", "");
    }
}
