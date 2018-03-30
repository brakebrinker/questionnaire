<?php

/* {# inline_template_start #}<div class="pdf-question"><strong>На каких проектах сотрудник предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее  челодня? В чем заключалась суть предложения?</strong></div>
<div class="pdf-answer">{% if webform_submission_value_174 %}{{ webform_submission_value_174 }}{% else %} Не заполнено {% endif %}</div> */
class __TwigTemplate_af6e5e3384797fbe696d35275811c347b56f2b16827945d8e6c7258eec3b0065 extends Twig_Template
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
        echo "<div class=\"pdf-question\"><strong>На каких проектах сотрудник предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее  челодня? В чем заключалась суть предложения?</strong></div>
<div class=\"pdf-answer\">";
        // line 2
        if (($context["webform_submission_value_174"] ?? null)) {
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["webform_submission_value_174"] ?? null), "html", null, true));
        } else {
            echo " Не заполнено ";
        }
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div class=\"pdf-question\"><strong>На каких проектах сотрудник предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее  челодня? В чем заключалась суть предложения?</strong></div>
<div class=\"pdf-answer\">{% if webform_submission_value_174 %}{{ webform_submission_value_174 }}{% else %} Не заполнено {% endif %}</div>";
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
        return new Twig_Source("", "{# inline_template_start #}<div class=\"pdf-question\"><strong>На каких проектах сотрудник предложил принятый впоследствии рефакторинг, использование новой библиотеки, проч. объемом не менее  челодня? В чем заключалась суть предложения?</strong></div>
<div class=\"pdf-answer\">{% if webform_submission_value_174 %}{{ webform_submission_value_174 }}{% else %} Не заполнено {% endif %}</div>", "");
    }
}
