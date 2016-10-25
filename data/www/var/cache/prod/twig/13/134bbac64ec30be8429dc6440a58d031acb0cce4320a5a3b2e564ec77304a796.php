<?php

/* NelmioApiDocBundle::method.html.twig */
class __TwigTemplate_d95e0b29828fbd0b05cfc0fe341e6b366ba163fab7ceb25d1923baea7fb3004b extends Twig_Template
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
        // line 1
        echo "<li class=\"";
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "method", array())), "html", null, true);
        echo " operation\" id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id", array()), "html", null, true);
        echo "\">
    <div class=\"heading toggler";
        // line 2
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "deprecated", array())) {
            echo " deprecated";
        }
        echo "\" data-href=\"#";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id", array()), "html", null, true);
        echo "\">
        <h3>
            <span class=\"http_method\">
                <i>";
        // line 5
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "method", array())), "html", null, true);
        echo "</i>
            </span>

            ";
        // line 8
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "deprecated", array())) {
            // line 9
            echo "            <span class=\"deprecated\">
                <i>DEPRECATED</i>
            </span>
            ";
        }
        // line 13
        echo "
            ";
        // line 14
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "https", array())) {
            // line 15
            echo "                <span class=\"icon lock\" title=\"HTTPS\"></span>
            ";
        }
        // line 17
        echo "            ";
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "authentication", array())) {
            // line 18
            echo "                <span class=\"icon keys\" title=\"Needs ";
            echo twig_escape_filter($this->env, (((twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "authenticationRoles", array())) > 0)) ? (twig_join_filter($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "authenticationRoles", array()), ", ")) : ("authentication")), "html", null, true);
            echo "\"></span>
            ";
        }
        // line 20
        echo "
            <span class=\"path\">
                ";
        // line 22
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "host", array(), "any", true, true)) {
            // line 23
            echo (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "https", array())) ? ("https://") : ("http://"));
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "host", array()), "html", null, true);
        }
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "uri", array()), "html", null, true);
        echo "
            </span>
           ";
        // line 28
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tags", array(), "any", true, true)) {
            // line 29
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tags", array()));
            foreach ($context['_seq'] as $context["tag"] => $context["color_code"]) {
                // line 30
                echo "                    <span class=\"tag\" ";
                if ((array_key_exists("color_code", $context) &&  !twig_test_empty($context["color_code"]))) {
                    echo "style=\"background-color:";
                    echo twig_escape_filter($this->env, $context["color_code"], "html", null, true);
                    echo ";\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["tag"], "html", null, true);
                echo "</span>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['tag'], $context['color_code'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "            ";
        }
        // line 33
        echo "        </h3>
        <ul class=\"options\">
            ";
        // line 35
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "description", array(), "any", true, true)) {
            // line 36
            echo "                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "description", array()), "html", null, true);
            echo "</li>
            ";
        }
        // line 38
        echo "        </ul>
    </div>

    <div class=\"content\" style=\"display: ";
        // line 41
        if ((array_key_exists("displayContent", $context) && ((isset($context["displayContent"]) ? $context["displayContent"] : null) == true))) {
            echo "display";
        } else {
            echo "none";
        }
        echo ";\">
        <ul class=\"tabs\">
            ";
        // line 43
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : null)) {
            // line 44
            echo "                <li class=\"selected\" data-pane=\"content\">Documentation</li>
                <li data-pane=\"sandbox\">Sandbox</li>
            ";
        }
        // line 47
        echo "        </ul>

        <div class=\"panes\">
            <div class=\"pane content selected\">
            ";
        // line 51
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "documentation", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "documentation", array())))) {
            // line 52
            echo "                <h4>Documentation</h4>
                <div>";
            // line 53
            echo $this->env->getExtension('nelmio_api_doc')->markdown($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "documentation", array()));
            echo "</div>
            ";
        }
        // line 55
        echo "
            ";
        // line 56
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "link", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "link", array())))) {
            // line 57
            echo "                <h4>Link</h4>
                <div><a href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "link", array()), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "link", array()), "html", null, true);
            echo "</a></div>
            ";
        }
        // line 60
        echo "
            ";
        // line 61
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array())))) {
            // line 62
            echo "                <h4>Requirements</h4>
                <table class=\"fullwidth\">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Requirement</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 73
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array()));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 74
                echo "                            <tr>
                                <td>";
                // line 75
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</td>
                                <td>";
                // line 76
                echo twig_escape_filter($this->env, (($this->getAttribute($context["infos"], "requirement", array(), "any", true, true)) ? ($this->getAttribute($context["infos"], "requirement", array())) : ("")), "html", null, true);
                echo "</td>
                                <td>";
                // line 77
                echo twig_escape_filter($this->env, (($this->getAttribute($context["infos"], "dataType", array(), "any", true, true)) ? ($this->getAttribute($context["infos"], "dataType", array())) : ("")), "html", null, true);
                echo "</td>
                                <td>";
                // line 78
                echo twig_escape_filter($this->env, (($this->getAttribute($context["infos"], "description", array(), "any", true, true)) ? ($this->getAttribute($context["infos"], "description", array())) : ("")), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "                    </tbody>
                </table>
            ";
        }
        // line 84
        echo "
            ";
        // line 85
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array())))) {
            // line 86
            echo "                <h4>Filters</h4>
                <table class=\"fullwidth\">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array()));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 96
                echo "                        <tr>
                            <td>";
                // line 97
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</td>
                            <td>
                                <table>
                                ";
                // line 100
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["infos"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 101
                    echo "                                    <tr>
                                        <td>";
                    // line 102
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $context["key"]), "html", null, true);
                    echo "</td>
                                        <td>";
                    // line 103
                    echo twig_escape_filter($this->env, trim(twig_replace_filter(twig_jsonencode_filter($context["value"]), array("\\\\" => "\\")), "\""), "html", null, true);
                    echo "</td>
                                    </tr>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 106
                echo "                                </table>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 110
            echo "                    </tbody>
                </table>
            ";
        }
        // line 113
        echo "
            ";
        // line 114
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array())))) {
            // line 115
            echo "                <h4>Parameters</h4>
                <table class='fullwidth'>
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Type</th>
                            <th>Required?</th>
                            <th>Format</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 127
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array()));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 128
                echo "                            ";
                if ( !$this->getAttribute($context["infos"], "readonly", array())) {
                    // line 129
                    echo "                                <tr>
                                    <td>";
                    // line 130
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 131
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["infos"], "dataType", array(), "any", true, true)) ? ($this->getAttribute($context["infos"], "dataType", array())) : ("")), "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 132
                    echo (($this->getAttribute($context["infos"], "required", array())) ? ("true") : ("false"));
                    echo "</td>
                                    <td>";
                    // line 133
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "format", array()), "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 134
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["infos"], "description", array(), "any", true, true)) ? ($this->getAttribute($context["infos"], "description", array())) : ("")), "html", null, true);
                    echo "</td>
                                </tr>
                            ";
                }
                // line 137
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo "                    </tbody>
                </table>
            ";
        }
        // line 141
        echo "
            ";
        // line 142
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parsedResponseMap", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parsedResponseMap", array())))) {
            // line 143
            echo "                <h4>Return</h4>
                <table class='fullwidth'>
                    <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Type</th>
                        <th>Versions</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                ";
            // line 153
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parsedResponseMap", array()));
            foreach ($context['_seq'] as $context["status_code"] => $context["response"]) {
                // line 154
                echo "                    <tbody>
                        <tr>
                            <td>
                                <h4>
                                    ";
                // line 158
                echo twig_escape_filter($this->env, $context["status_code"], "html", null, true);
                echo "
                                    ";
                // line 159
                if ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "statusCodes", array(), "any", false, true), $context["status_code"], array(), "array", true, true)) {
                    // line 160
                    echo "                                        - ";
                    echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "statusCodes", array()), $context["status_code"], array(), "array"), ", "), "html", null, true);
                    echo "
                                    ";
                }
                // line 162
                echo "                                </h4>
                            </td>
                        </tr>
                    ";
                // line 165
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["response"], "model", array()));
                foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                    // line 166
                    echo "                        <tr>
                            <td>";
                    // line 167
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "</td>
                            <td>";
                    // line 168
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "dataType", array()), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 169
                    $this->loadTemplate("NelmioApiDocBundle:Components:version.html.twig", "NelmioApiDocBundle::method.html.twig", 169)->display(array("sinceVersion" => $this->getAttribute($context["infos"], "sinceVersion", array()), "untilVersion" => $this->getAttribute($context["infos"], "untilVersion", array())));
                    echo "</td>
                            <td>";
                    // line 170
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                    echo "</td>
                        </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 173
                echo "                    </tbody>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['status_code'], $context['response'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            echo "                </table>
            ";
        }
        // line 177
        echo "
            ";
        // line 178
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "statusCodes", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "statusCodes", array())))) {
            // line 179
            echo "                <h4>Status Codes</h4>
                <table class=\"fullwidth\">
                    <thead>
                    <tr>
                        <th>Status Code</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
            // line 188
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "statusCodes", array()));
            foreach ($context['_seq'] as $context["status_code"] => $context["descriptions"]) {
                // line 189
                echo "                        <tr>
                            <td><a href=\"http://en.wikipedia.org/wiki/HTTP_";
                // line 190
                echo twig_escape_filter($this->env, $context["status_code"], "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $context["status_code"], "html", null, true);
                echo "</a></td>
                            <td>
                                <ul>
                                    ";
                // line 193
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["descriptions"]);
                foreach ($context['_seq'] as $context["_key"] => $context["description"]) {
                    // line 194
                    echo "                                        <li>";
                    echo twig_escape_filter($this->env, $context["description"], "html", null, true);
                    echo "</li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['description'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 196
                echo "                                </ul>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['status_code'], $context['descriptions'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 200
            echo "                    </tbody>
                </table>
            ";
        }
        // line 203
        echo "
            ";
        // line 204
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "cache", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "cache", array())))) {
            // line 205
            echo "                <h4>Cache</h4>
                <div>";
            // line 206
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "cache", array()), "html", null, true);
            echo "s</div>
            ";
        }
        // line 208
        echo "
            </div>

            ";
        // line 211
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : null)) {
            // line 212
            echo "                <div class=\"pane sandbox\">
                    ";
            // line 213
            if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array())) && $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "https", array())) && ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "secure", array()) != $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "https", array())))) {
                // line 214
                echo "                    Please reload the documentation using the scheme ";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "https", array())) {
                    echo "HTTPS";
                } else {
                    echo "HTTP";
                }
                echo " if you want to use the sandbox.
                    ";
            } else {
                // line 216
                echo "                        <form method=\"\" action=\"";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "host", array(), "any", true, true)) {
                    echo (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "https", array())) ? ("https://") : ("http://"));
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "host", array()), "html", null, true);
                }
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "uri", array()), "html", null, true);
                echo "\">
                            <fieldset class=\"parameters\">
                                <legend>Input</legend>
                                ";
                // line 219
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array(), "any", true, true)) {
                    // line 220
                    echo "                                    <h4>Requirements</h4>
                                    ";
                    // line 221
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array()));
                    foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                        // line 222
                        echo "                                        <p class=\"tuple\">
                                            <input type=\"text\" class=\"key\" value=\"";
                        // line 223
                        echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                        echo "\" placeholder=\"Key\" />
                                            <span>=</span>
                                            <input type=\"text\" class=\"value\" placeholder=\"";
                        // line 225
                        if ($this->getAttribute($context["infos"], "description", array(), "any", true, true)) {
                            echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                        } else {
                            echo "Value";
                        }
                        echo "\" ";
                        if ($this->getAttribute($context["infos"], "default", array(), "any", true, true)) {
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "default", array()), "html", null, true);
                            echo "\" ";
                        }
                        echo "/> <span class=\"remove\">-</span>
                                        </p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 228
                    echo "                                ";
                }
                // line 229
                echo "                                ";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array(), "any", true, true)) {
                    // line 230
                    echo "                                    <h4>Filters</h4>
                                    ";
                    // line 231
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array()));
                    foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                        // line 232
                        echo "                                        <p class=\"tuple\">
                                            <input type=\"text\" class=\"key\" value=\"";
                        // line 233
                        echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                        echo "\" placeholder=\"Key\" />
                                            <span>=</span>
                                            <input type=\"text\" class=\"value\" placeholder=\"";
                        // line 235
                        if ($this->getAttribute($context["infos"], "description", array(), "any", true, true)) {
                            echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                        } else {
                            echo "Value";
                        }
                        echo "\" ";
                        if ($this->getAttribute($context["infos"], "default", array(), "any", true, true)) {
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "default", array()), "html", null, true);
                            echo "\" ";
                        }
                        echo "/> <span class=\"remove\">-</span>
                                        </p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 238
                    echo "                                ";
                }
                // line 239
                echo "                                ";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array(), "any", true, true)) {
                    // line 240
                    echo "                                    <h4>Parameters</h4>
                                    ";
                    // line 241
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array()));
                    foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                        // line 242
                        echo "                                    ";
                        if ( !$this->getAttribute($context["infos"], "readonly", array())) {
                            // line 243
                            echo "                                        <p class=\"tuple\" data-dataType=\"";
                            if ($this->getAttribute($context["infos"], "dataType", array())) {
                                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "dataType", array()), "html", null, true);
                            }
                            echo "\" data-format=\"";
                            if ($this->getAttribute($context["infos"], "format", array())) {
                                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "format", array()), "html", null, true);
                            }
                            echo "\" data-description=\"";
                            if ($this->getAttribute($context["infos"], "description", array())) {
                                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                            }
                            echo "\">
                                            <input type=\"text\" class=\"key\" value=\"";
                            // line 244
                            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                            echo "\" placeholder=\"Key\" />
                                            <span>=</span>
                                            <select class=\"tuple_type\">
                                                <option value=\"\">Type</option>
                                                <option value=\"string\">String</option>
                                                <option value=\"boolean\">Boolean</option>
                                                <option value=\"file\">File</option>
                                                <option value=\"textarea\">Textarea</option>
                                            </select>
                                            <input type=\"text\" class=\"value\" placeholder=\"";
                            // line 253
                            if ($this->getAttribute($context["infos"], "dataType", array())) {
                                echo "[";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "dataType", array()), "html", null, true);
                                echo "] ";
                            }
                            if ($this->getAttribute($context["infos"], "format", array())) {
                                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "format", array()), "html", null, true);
                            }
                            if ($this->getAttribute($context["infos"], "description", array())) {
                                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                            } else {
                                echo "Value";
                            }
                            echo "\" ";
                            if ($this->getAttribute($context["infos"], "default", array(), "any", true, true)) {
                                echo " value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "default", array()), "html", null, true);
                                echo "\" ";
                            }
                            echo "/> <span class=\"remove\">-</span>
                                        </p>
                                    ";
                        }
                        // line 256
                        echo "                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 257
                    echo "                                    <button type=\"button\" class=\"add_parameter\">New parameter</button>
                                ";
                }
                // line 259
                echo "
                            </fieldset>

                            <fieldset class=\"headers\">
                                ";
                // line 263
                $context["methods"] = twig_split_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "method", array())), "|");
                // line 264
                echo "                                ";
                if ((twig_length_filter($this->env, (isset($context["methods"]) ? $context["methods"] : null)) > 1)) {
                    // line 265
                    echo "                                    <legend>Method</legend>
                                    <select name=\"header_method\">
                                    ";
                    // line 267
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) ? $context["methods"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
                        // line 268
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, $context["method"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["method"], "html", null, true);
                        echo "</option>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 270
                    echo "                                    </select>
                                ";
                } else {
                    // line 272
                    echo "                                    <input type=\"hidden\" name=\"header_method\" value=\"";
                    echo twig_escape_filter($this->env, twig_join_filter((isset($context["methods"]) ? $context["methods"] : null)), "html", null, true);
                    echo "\" />
                                ";
                }
                // line 274
                echo "
                                <legend>Headers</legend>

                                ";
                // line 277
                if ((isset($context["acceptType"]) ? $context["acceptType"] : null)) {
                    // line 278
                    echo "                                    <p class=\"tuple\">
                                        <input type=\"text\" class=\"key\" value=\"Accept\" />
                                        <span>=</span>
                                        <input type=\"text\" class=\"value\" value=\"";
                    // line 281
                    echo twig_escape_filter($this->env, (isset($context["acceptType"]) ? $context["acceptType"] : null), "html", null, true);
                    echo "\" /> <span class=\"remove\">-</span>
                                    </p>
                                ";
                }
                // line 284
                echo "
                                <p class=\"tuple\">
                                    <input type=\"text\" class=\"key\" placeholder=\"Key\" />
                                    <span>=</span>
                                    <input type=\"text\" class=\"value\" placeholder=\"Value\" /> <span class=\"remove\">-</span>
                                </p>

                                <button type=\"button\" class=\"add_header\">New header</button>
                            </fieldset>

                            <fieldset class=\"request-content\">
                                <legend>Content</legend>

                                <textarea class=\"content\" placeholder=\"Content set here will override the parameters that do not match the url\"></textarea>

                                <p class=\"tuple\">
                                    <input type=\"text\" class=\"key content-type\" value=\"Content-Type\" disabled=\"disabled\" />
                                    <span>=</span>
                                    <input type=\"text\" class=\"value\" placeholder=\"Value\" />
                                    <button  type=\"button\" class=\"set-content-type\">Set header</button> <small>Replaces header if set</small>
                                </p>
                            </fieldset>

                            <div class=\"buttons\">
                                <input type=\"submit\" value=\"Try!\" />
                            </div>
                        </form>

                        <script type=\"text/x-tmpl\" class=\"parameters_tuple_template\">
                        <p class=\"tuple\">
                            <input type=\"text\" class=\"key\" placeholder=\"Key\" />
                            <span>=</span>
                            <select class=\"tuple_type\">
                                                <option value=\"\">Type</option>
                                                <option value=\"string\">String</option>
                                                <option value=\"boolean\">Boolean</option>
                                                <option value=\"file\">File</option>
                                                <option value=\"textarea\">Textarea</option>
                                            </select>
                            <input type=\"text\" class=\"value\" placeholder=\"Value\" /> <span class=\"remove\">-</span>
                        </p>
                        </script>

                        <script type=\"text/x-tmpl\" class=\"headers_tuple_template\">
                        <p class=\"tuple\">
                            <input type=\"text\" class=\"key\" placeholder=\"Key\" />
                            <span>=</span>
                            <input type=\"text\" class=\"value\" placeholder=\"Value\" /> <span class=\"remove\">-</span>
                        </p>
                        </script>


                        <div class=\"result\">
                            <h4>Request URL</h4>
                            <pre class=\"url\"></pre>

                            <h4>Response Headers&nbsp;<small>[<a href=\"\" class=\"to-expand\">Expand</a>]</small>&nbsp;<small class=\"profiler\">[<a href=\"\" class=\"profiler-link\" target=\"_blank\">Profiler</a>]</small></h4>
                            <pre class=\"headers to-expand\"></pre>

                            <h4>Response Body&nbsp;<small>[<a href=\"\" class=\"to-raw\">Raw</a>]</small></h4>
                            <pre class=\"response prettyprint\"></pre>
                        </div>
                    ";
            }
            // line 347
            echo "                </div>
            ";
        }
        // line 349
        echo "        </div>
    </div>
</li>
";
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::method.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  816 => 349,  812 => 347,  747 => 284,  741 => 281,  736 => 278,  734 => 277,  729 => 274,  723 => 272,  719 => 270,  708 => 268,  704 => 267,  700 => 265,  697 => 264,  695 => 263,  689 => 259,  685 => 257,  679 => 256,  655 => 253,  643 => 244,  628 => 243,  625 => 242,  621 => 241,  618 => 240,  615 => 239,  612 => 238,  593 => 235,  588 => 233,  585 => 232,  581 => 231,  578 => 230,  575 => 229,  572 => 228,  553 => 225,  548 => 223,  545 => 222,  541 => 221,  538 => 220,  536 => 219,  525 => 216,  515 => 214,  513 => 213,  510 => 212,  508 => 211,  503 => 208,  498 => 206,  495 => 205,  493 => 204,  490 => 203,  485 => 200,  476 => 196,  467 => 194,  463 => 193,  455 => 190,  452 => 189,  448 => 188,  437 => 179,  435 => 178,  432 => 177,  428 => 175,  421 => 173,  412 => 170,  408 => 169,  404 => 168,  400 => 167,  397 => 166,  393 => 165,  388 => 162,  382 => 160,  380 => 159,  376 => 158,  370 => 154,  366 => 153,  354 => 143,  352 => 142,  349 => 141,  344 => 138,  338 => 137,  332 => 134,  328 => 133,  324 => 132,  320 => 131,  316 => 130,  313 => 129,  310 => 128,  306 => 127,  292 => 115,  290 => 114,  287 => 113,  282 => 110,  273 => 106,  264 => 103,  260 => 102,  257 => 101,  253 => 100,  247 => 97,  244 => 96,  240 => 95,  229 => 86,  227 => 85,  224 => 84,  219 => 81,  210 => 78,  206 => 77,  202 => 76,  198 => 75,  195 => 74,  191 => 73,  178 => 62,  176 => 61,  173 => 60,  166 => 58,  163 => 57,  161 => 56,  158 => 55,  153 => 53,  150 => 52,  148 => 51,  142 => 47,  137 => 44,  135 => 43,  126 => 41,  121 => 38,  115 => 36,  113 => 35,  109 => 33,  106 => 32,  91 => 30,  86 => 29,  84 => 28,  79 => 26,  76 => 24,  74 => 23,  72 => 22,  68 => 20,  62 => 18,  59 => 17,  55 => 15,  53 => 14,  50 => 13,  44 => 9,  42 => 8,  36 => 5,  26 => 2,  19 => 1,);
    }
}
/* <li class="{{ data.method|lower }} operation" id="{{ data.id }}">*/
/*     <div class="heading toggler{% if data.deprecated %} deprecated{% endif %}" data-href="#{{ data.id }}">*/
/*         <h3>*/
/*             <span class="http_method">*/
/*                 <i>{{ data.method|upper }}</i>*/
/*             </span>*/
/* */
/*             {% if data.deprecated %}*/
/*             <span class="deprecated">*/
/*                 <i>DEPRECATED</i>*/
/*             </span>*/
/*             {% endif %}*/
/* */
/*             {% if data.https %}*/
/*                 <span class="icon lock" title="HTTPS"></span>*/
/*             {% endif %}*/
/*             {% if data.authentication %}*/
/*                 <span class="icon keys" title="Needs {{ data.authenticationRoles|length > 0 ? data.authenticationRoles|join(', ') : 'authentication' }}"></span>*/
/*             {% endif %}*/
/* */
/*             <span class="path">*/
/*                 {% if data.host is defined -%}*/
/*                     {{ data.https ? 'https://' : 'http://' -}}*/
/*                     {{ data.host -}}*/
/*                 {% endif -%}*/
/*                 {{ data.uri }}*/
/*             </span>*/
/*            {% if data.tags is defined %}*/
/*                 {% for tag, color_code in data.tags %}*/
/*                     <span class="tag" {% if color_code is defined and color_code is not empty %}style="background-color:{{ color_code }};"{% endif %}>{{ tag }}</span>*/
/*                 {% endfor %}*/
/*             {%  endif %}*/
/*         </h3>*/
/*         <ul class="options">*/
/*             {% if data.description is defined %}*/
/*                 <li>{{ data.description }}</li>*/
/*             {% endif %}*/
/*         </ul>*/
/*     </div>*/
/* */
/*     <div class="content" style="display: {% if displayContent is defined and displayContent == true %}display{% else %}none{% endif %};">*/
/*         <ul class="tabs">*/
/*             {% if enableSandbox %}*/
/*                 <li class="selected" data-pane="content">Documentation</li>*/
/*                 <li data-pane="sandbox">Sandbox</li>*/
/*             {% endif %}*/
/*         </ul>*/
/* */
/*         <div class="panes">*/
/*             <div class="pane content selected">*/
/*             {% if data.documentation is defined and data.documentation is not empty %}*/
/*                 <h4>Documentation</h4>*/
/*                 <div>{{ data.documentation|extra_markdown }}</div>*/
/*             {% endif %}*/
/* */
/*             {% if data.link is defined and data.link is not empty %}*/
/*                 <h4>Link</h4>*/
/*                 <div><a href="{{ data.link }}" target="_blank">{{ data.link }}</a></div>*/
/*             {% endif %}*/
/* */
/*             {% if data.requirements is defined and data.requirements is not empty %}*/
/*                 <h4>Requirements</h4>*/
/*                 <table class="fullwidth">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>Name</th>*/
/*                             <th>Requirement</th>*/
/*                             <th>Type</th>*/
/*                             <th>Description</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         {% for name, infos in data.requirements %}*/
/*                             <tr>*/
/*                                 <td>{{ name }}</td>*/
/*                                 <td>{{ infos.requirement is defined ? infos.requirement : ''}}</td>*/
/*                                 <td>{{ infos.dataType is defined ? infos.dataType : ''}}</td>*/
/*                                 <td>{{ infos.description is defined ? infos.description : ''}}</td>*/
/*                             </tr>*/
/*                         {% endfor %}*/
/*                     </tbody>*/
/*                 </table>*/
/*             {% endif %}*/
/* */
/*             {% if data.filters is defined and data.filters is not empty %}*/
/*                 <h4>Filters</h4>*/
/*                 <table class="fullwidth">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>Name</th>*/
/*                             <th>Information</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                     {% for name, infos in data.filters %}*/
/*                         <tr>*/
/*                             <td>{{ name }}</td>*/
/*                             <td>*/
/*                                 <table>*/
/*                                 {% for key, value in infos %}*/
/*                                     <tr>*/
/*                                         <td>{{ key|title }}</td>*/
/*                                         <td>{{ value|json_encode|replace({'\\\\': '\\'})|trim('"') }}</td>*/
/*                                     </tr>*/
/*                                 {% endfor %}*/
/*                                 </table>*/
/*                             </td>*/
/*                         </tr>*/
/*                     {% endfor %}*/
/*                     </tbody>*/
/*                 </table>*/
/*             {% endif %}*/
/* */
/*             {% if data.parameters is defined and data.parameters is not empty %}*/
/*                 <h4>Parameters</h4>*/
/*                 <table class='fullwidth'>*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>Parameter</th>*/
/*                             <th>Type</th>*/
/*                             <th>Required?</th>*/
/*                             <th>Format</th>*/
/*                             <th>Description</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         {% for name, infos in data.parameters %}*/
/*                             {% if not infos.readonly %}*/
/*                                 <tr>*/
/*                                     <td>{{ name }}</td>*/
/*                                     <td>{{ infos.dataType is defined ? infos.dataType : '' }}</td>*/
/*                                     <td>{{ infos.required ? 'true' : 'false' }}</td>*/
/*                                     <td>{{ infos.format }}</td>*/
/*                                     <td>{{ infos.description is defined ? infos.description : ''  }}</td>*/
/*                                 </tr>*/
/*                             {% endif %}*/
/*                         {% endfor %}*/
/*                     </tbody>*/
/*                 </table>*/
/*             {% endif %}*/
/* */
/*             {% if data.parsedResponseMap is defined and data.parsedResponseMap is not empty %}*/
/*                 <h4>Return</h4>*/
/*                 <table class='fullwidth'>*/
/*                     <thead>*/
/*                     <tr>*/
/*                         <th>Parameter</th>*/
/*                         <th>Type</th>*/
/*                         <th>Versions</th>*/
/*                         <th>Description</th>*/
/*                     </tr>*/
/*                     </thead>*/
/*                 {% for status_code, response in data.parsedResponseMap %}*/
/*                     <tbody>*/
/*                         <tr>*/
/*                             <td>*/
/*                                 <h4>*/
/*                                     {{ status_code }}*/
/*                                     {% if data.statusCodes[status_code] is defined %}*/
/*                                         - {{ data.statusCodes[status_code]|join(', ') }}*/
/*                                     {% endif %}*/
/*                                 </h4>*/
/*                             </td>*/
/*                         </tr>*/
/*                     {% for name, infos in response.model %}*/
/*                         <tr>*/
/*                             <td>{{ name }}</td>*/
/*                             <td>{{ infos.dataType }}</td>*/
/*                             <td>{% include 'NelmioApiDocBundle:Components:version.html.twig' with {'sinceVersion': infos.sinceVersion, 'untilVersion': infos.untilVersion} only %}</td>*/
/*                             <td>{{ infos.description }}</td>*/
/*                         </tr>*/
/*                     {% endfor %}*/
/*                     </tbody>*/
/*                 {% endfor %}*/
/*                 </table>*/
/*             {% endif %}*/
/* */
/*             {% if data.statusCodes is defined and data.statusCodes is not empty %}*/
/*                 <h4>Status Codes</h4>*/
/*                 <table class="fullwidth">*/
/*                     <thead>*/
/*                     <tr>*/
/*                         <th>Status Code</th>*/
/*                         <th>Description</th>*/
/*                     </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                     {% for status_code, descriptions in data.statusCodes %}*/
/*                         <tr>*/
/*                             <td><a href="http://en.wikipedia.org/wiki/HTTP_{{ status_code }}" target="_blank">{{ status_code }}</a></td>*/
/*                             <td>*/
/*                                 <ul>*/
/*                                     {% for description in descriptions %}*/
/*                                         <li>{{ description }}</li>*/
/*                                     {%  endfor %}*/
/*                                 </ul>*/
/*                             </td>*/
/*                         </tr>*/
/*                     {% endfor %}*/
/*                     </tbody>*/
/*                 </table>*/
/*             {% endif %}*/
/* */
/*             {% if data.cache is defined and data.cache is not empty %}*/
/*                 <h4>Cache</h4>*/
/*                 <div>{{ data.cache }}s</div>*/
/*             {% endif %}*/
/* */
/*             </div>*/
/* */
/*             {% if enableSandbox %}*/
/*                 <div class="pane sandbox">*/
/*                     {% if app.request is not null and data.https and app.request.secure != data.https %}*/
/*                     Please reload the documentation using the scheme {% if data.https %}HTTPS{% else %}HTTP{% endif %} if you want to use the sandbox.*/
/*                     {% else %}*/
/*                         <form method="" action="{% if data.host is defined %}{{ data.https ? 'https://' : 'http://' }}{{ data.host }}{% endif %}{{ data.uri }}">*/
/*                             <fieldset class="parameters">*/
/*                                 <legend>Input</legend>*/
/*                                 {% if data.requirements is defined %}*/
/*                                     <h4>Requirements</h4>*/
/*                                     {% for name, infos in data.requirements %}*/
/*                                         <p class="tuple">*/
/*                                             <input type="text" class="key" value="{{ name }}" placeholder="Key" />*/
/*                                             <span>=</span>*/
/*                                             <input type="text" class="value" placeholder="{% if infos.description is defined %}{{ infos.description }}{% else %}Value{% endif %}" {% if infos.default is defined %} value="{{ infos.default }}" {% endif %}/> <span class="remove">-</span>*/
/*                                         </p>*/
/*                                     {% endfor %}*/
/*                                 {% endif %}*/
/*                                 {% if data.filters is defined %}*/
/*                                     <h4>Filters</h4>*/
/*                                     {% for name, infos in data.filters %}*/
/*                                         <p class="tuple">*/
/*                                             <input type="text" class="key" value="{{ name }}" placeholder="Key" />*/
/*                                             <span>=</span>*/
/*                                             <input type="text" class="value" placeholder="{% if infos.description is defined %}{{ infos.description }}{% else %}Value{% endif %}" {% if infos.default is defined %} value="{{ infos.default }}" {% endif %}/> <span class="remove">-</span>*/
/*                                         </p>*/
/*                                     {% endfor %}*/
/*                                 {% endif %}*/
/*                                 {% if data.parameters is defined %}*/
/*                                     <h4>Parameters</h4>*/
/*                                     {% for name, infos in data.parameters %}*/
/*                                     {% if not infos.readonly %}*/
/*                                         <p class="tuple" data-dataType="{% if infos.dataType %}{{ infos.dataType }}{% endif %}" data-format="{% if infos.format %}{{ infos.format }}{% endif %}" data-description="{% if infos.description %}{{ infos.description }}{% endif %}">*/
/*                                             <input type="text" class="key" value="{{ name }}" placeholder="Key" />*/
/*                                             <span>=</span>*/
/*                                             <select class="tuple_type">*/
/*                                                 <option value="">Type</option>*/
/*                                                 <option value="string">String</option>*/
/*                                                 <option value="boolean">Boolean</option>*/
/*                                                 <option value="file">File</option>*/
/*                                                 <option value="textarea">Textarea</option>*/
/*                                             </select>*/
/*                                             <input type="text" class="value" placeholder="{% if infos.dataType %}[{{ infos.dataType }}] {% endif %}{% if infos.format %}{{ infos.format }}{% endif %}{% if infos.description %}{{ infos.description }}{% else %}Value{% endif %}" {% if infos.default is defined %} value="{{ infos.default }}" {% endif %}/> <span class="remove">-</span>*/
/*                                         </p>*/
/*                                     {% endif %}*/
/*                                     {% endfor %}*/
/*                                     <button type="button" class="add_parameter">New parameter</button>*/
/*                                 {% endif %}*/
/* */
/*                             </fieldset>*/
/* */
/*                             <fieldset class="headers">*/
/*                                 {% set methods = data.method|upper|split('|') %}*/
/*                                 {% if methods|length > 1 %}*/
/*                                     <legend>Method</legend>*/
/*                                     <select name="header_method">*/
/*                                     {% for method in methods %}*/
/*                                         <option value="{{ method }}">{{ method }}</option>*/
/*                                     {% endfor %}*/
/*                                     </select>*/
/*                                 {% else %}*/
/*                                     <input type="hidden" name="header_method" value="{{ methods|join }}" />*/
/*                                 {% endif %}*/
/* */
/*                                 <legend>Headers</legend>*/
/* */
/*                                 {% if acceptType %}*/
/*                                     <p class="tuple">*/
/*                                         <input type="text" class="key" value="Accept" />*/
/*                                         <span>=</span>*/
/*                                         <input type="text" class="value" value="{{ acceptType }}" /> <span class="remove">-</span>*/
/*                                     </p>*/
/*                                 {% endif %}*/
/* */
/*                                 <p class="tuple">*/
/*                                     <input type="text" class="key" placeholder="Key" />*/
/*                                     <span>=</span>*/
/*                                     <input type="text" class="value" placeholder="Value" /> <span class="remove">-</span>*/
/*                                 </p>*/
/* */
/*                                 <button type="button" class="add_header">New header</button>*/
/*                             </fieldset>*/
/* */
/*                             <fieldset class="request-content">*/
/*                                 <legend>Content</legend>*/
/* */
/*                                 <textarea class="content" placeholder="Content set here will override the parameters that do not match the url"></textarea>*/
/* */
/*                                 <p class="tuple">*/
/*                                     <input type="text" class="key content-type" value="Content-Type" disabled="disabled" />*/
/*                                     <span>=</span>*/
/*                                     <input type="text" class="value" placeholder="Value" />*/
/*                                     <button  type="button" class="set-content-type">Set header</button> <small>Replaces header if set</small>*/
/*                                 </p>*/
/*                             </fieldset>*/
/* */
/*                             <div class="buttons">*/
/*                                 <input type="submit" value="Try!" />*/
/*                             </div>*/
/*                         </form>*/
/* */
/*                         <script type="text/x-tmpl" class="parameters_tuple_template">*/
/*                         <p class="tuple">*/
/*                             <input type="text" class="key" placeholder="Key" />*/
/*                             <span>=</span>*/
/*                             <select class="tuple_type">*/
/*                                                 <option value="">Type</option>*/
/*                                                 <option value="string">String</option>*/
/*                                                 <option value="boolean">Boolean</option>*/
/*                                                 <option value="file">File</option>*/
/*                                                 <option value="textarea">Textarea</option>*/
/*                                             </select>*/
/*                             <input type="text" class="value" placeholder="Value" /> <span class="remove">-</span>*/
/*                         </p>*/
/*                         </script>*/
/* */
/*                         <script type="text/x-tmpl" class="headers_tuple_template">*/
/*                         <p class="tuple">*/
/*                             <input type="text" class="key" placeholder="Key" />*/
/*                             <span>=</span>*/
/*                             <input type="text" class="value" placeholder="Value" /> <span class="remove">-</span>*/
/*                         </p>*/
/*                         </script>*/
/* */
/* */
/*                         <div class="result">*/
/*                             <h4>Request URL</h4>*/
/*                             <pre class="url"></pre>*/
/* */
/*                             <h4>Response Headers&nbsp;<small>[<a href="" class="to-expand">Expand</a>]</small>&nbsp;<small class="profiler">[<a href="" class="profiler-link" target="_blank">Profiler</a>]</small></h4>*/
/*                             <pre class="headers to-expand"></pre>*/
/* */
/*                             <h4>Response Body&nbsp;<small>[<a href="" class="to-raw">Raw</a>]</small></h4>*/
/*                             <pre class="response prettyprint"></pre>*/
/*                         </div>*/
/*                     {% endif %}*/
/*                 </div>*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* </li>*/
/* */
