<?php

/* {# inline_template_start #}<span class="not-filling">Не заполнена ({{ uid_1 }})</span><a href="mailto:{{ mail }}?subject=Напоминание: заполнить анкету тимлида&body=Для заполнения анкеты%2C перейдите по ссылке%20{{ token }}" title="Напомнить"> <i class="fa fa-envelope-o" aria-hidden="true"></i></a> */
class __TwigTemplate_9452fbe4a40d200c5df490d5043d78857cae768e9942793c573f4a7feafdfd20 extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
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
        echo "<span class=\"not-filling\">Не заполнена (";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["uid_1"] ?? null), "html", null, true));
        echo ")</span><a href=\"mailto:";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["mail"] ?? null), "html", null, true));
        echo "?subject=Напоминание: заполнить анкету тимлида&body=Для заполнения анкеты%2C перейдите по ссылке%20";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["token"] ?? null), "html", null, true));
        echo "\" title=\"Напомнить\"> <i class=\"fa fa-envelope-o\" aria-hidden=\"true\"></i></a>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<span class=\"not-filling\">Не заполнена ({{ uid_1 }})</span><a href=\"mailto:{{ mail }}?subject=Напоминание: заполнить анкету тимлида&body=Для заполнения анкеты%2C перейдите по ссылке%20{{ token }}\" title=\"Напомнить\"> <i class=\"fa fa-envelope-o\" aria-hidden=\"true\"></i></a>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "{# inline_template_start #}<span class=\"not-filling\">Не заполнена ({{ uid_1 }})</span><a href=\"mailto:{{ mail }}?subject=Напоминание: заполнить анкету тимлида&body=Для заполнения анкеты%2C перейдите по ссылке%20{{ token }}\" title=\"Напомнить\"> <i class=\"fa fa-envelope-o\" aria-hidden=\"true\"></i></a>", "");
    }
}
