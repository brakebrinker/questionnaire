<?php

/* {# inline_template_start #}<div class="pdf-question"><strong>На каких проектах ты предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее 5  челодней? В чем заключалась суть предложения?</strong></div>
<div class="pdf-answer">{% if webform_submission_value_79 %}{{ webform_submission_value_79 }}{% else %} Не заполнено {% endif %}</div> */
class __TwigTemplate_bd7c233d8aa91c7d8ebdd15c1e4e9380653f71a0ee16cad4603c68f582bff3fe extends Twig_Template
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
        echo "<div class=\"pdf-question\"><strong>На каких проектах ты предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее 5  челодней? В чем заключалась суть предложения?</strong></div>
<div class=\"pdf-answer\">";
        // line 2
        if (($context["webform_submission_value_79"] ?? null)) {
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["webform_submission_value_79"] ?? null), "html", null, true));
        } else {
            echo " Не заполнено ";
        }
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div class=\"pdf-question\"><strong>На каких проектах ты предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее 5  челодней? В чем заключалась суть предложения?</strong></div>
<div class=\"pdf-answer\">{% if webform_submission_value_79 %}{{ webform_submission_value_79 }}{% else %} Не заполнено {% endif %}</div>";
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
        return new Twig_Source("", "{# inline_template_start #}<div class=\"pdf-question\"><strong>На каких проектах ты предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее 5  челодней? В чем заключалась суть предложения?</strong></div>
<div class=\"pdf-answer\">{% if webform_submission_value_79 %}{{ webform_submission_value_79 }}{% else %} Не заполнено {% endif %}</div>", "");
    }
}
