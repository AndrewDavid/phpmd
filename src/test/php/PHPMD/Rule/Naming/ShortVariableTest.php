<?php
/**
 * This file is part of PHP Mess Detector.
 *
 * Copyright (c) 2008-2012, Manuel Pichler <mapi@phpmd.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *_Naming
 * @author    Manuel Pichler <mapi@phpmd.org>
 * @copyright 2008-2014 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version   @project.version@
 */

namespace PHPMD\Rule\Naming;

use PHPMD\AbstractTest;

/**
 * Test case for the really short variable, parameter and property name rule.
 *_Naming
 * @author    Manuel Pichler <mapi@phpmd.org>
 * @copyright 2008-2014 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version   @project.version@
 *
 * @covers PHPMD\Rule\Naming\ShortVariable
 * @group phpmd
 * @group phpmd::rule
 * @group phpmd::rule::naming
 * @group unittest
 */
class ShortVariableTest extends AbstractTest
{

    /**
     * testRuleAppliesToLocalVariableInFunctionWithNameShorterThanThreshold
     *
     * @return void
     */
    public function testRuleAppliesToLocalVariableInFunctionWithNameShorterThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(1));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleNotAppliesToLocalVariableInFunctionWithNameLongerThanThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToLocalVariableInFunctionWithNameLongerThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 2);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleNotAppliesToLocalVariableInFunctionWithNameEqualToThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToLocalVariableInFunctionWithNameEqualToThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleAppliesToFunctionParameterWithNameShorterThanThreshold
     *
     * @return void
     */
    public function testRuleAppliesToFunctionParameterWithNameShorterThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(1));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleNotAppliesToFunctionParameterWithNameLongerThanThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToFunctionParameterWithNameLongerThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleAppliesToLocalVariableInMethodWithNameShorterThanThreshold
     *
     * @return void
     */
    public function testRuleAppliesToLocalVariableInMethodWithNameShorterThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(1));

        $class = $this->getClass();
        $rule->apply($class);

        foreach ($class->getMethods() as $method) {
            $rule->apply($method);
        }
    }

    /**
     * testRuleNotAppliesToLocalVariableInMethodWithNameEqualToThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToLocalVariableInMethodWithNameEqualToThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getClass());
    }

    /**
     * testRuleNotAppliesToLocalVariableInMethodWithNameLongerThanThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToLocalVariableInMethodWithNameLongerThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 2);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getClass());
    }

    /**
     * testRuleAppliesToMethodParameterWithNameShorterThanThreshold
     *
     * @return void
     */
    public function testRuleAppliesToMethodParameterWithNameShorterThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(1));

        $class = $this->getClass();
        $rule->apply($class);

        foreach ($class->getMethods() as $method) {
            $rule->apply($method);
        }
    }

    /**
     * testRuleNotAppliesToMethodParameterWithNameLongerThanThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToMethodParameterWithNameLongerThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 2);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getClass());
    }

    /**
     * testRuleAppliesToFieldWithNameShorterThanThreshold
     *
     * @return void
     */
    public function testRuleAppliesToFieldWithNameShorterThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(1));
        $rule->apply($this->getClass());
    }

    /**
     * testRuleNotAppliesToFieldWithNameEqualToThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToFieldWithNameEqualToThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getClass());
    }

    /**
     * testRuleNotAppliesToFieldWithNameGreaterThanThreshold
     *
     * @return void
     */
    public function testRuleNotAppliesToFieldWithNameGreaterThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 2);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getClass());
    }

    /**
     * testRuleAppliesToFieldAndParameterWithNameShorterThanThreshold
     *
     * @return void
     */
    public function testRuleAppliesToFieldAndParameterWithNameShorterThanThreshold()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(2));

        $class = $this->getClass();
        $rule->apply($class);

        foreach ($class->getMethods() as $method) {
            $rule->apply($method);
        }
    }

    /**
     * testRuleNotAppliesToShortVariableNameAsForLoopIndex
     *
     * @return void
     */
    public function testRuleNotAppliesToShortVariableNameAsForLoopIndex()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleNotAppliesToShortVariableNameAsForeachLoopIndex
     *
     * @return void
     */
    public function testRuleNotAppliesToShortVariableNameAsForeachLoopIndex()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleNotAppliesToShortVariableNameInCatchStatement
     *
     * @return void
     */
    public function testRuleNotAppliesToShortVariableNameInCatchStatement()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleNotAppliesToStaticMembersAccessedInMethod
     *
     * @return void
     */
    public function testRuleNotAppliesToStaticMembersAccessedInMethod()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getMethod());
    }

    /**
     * testRuleAppliesToIdenticalVariableOnlyOneTime
     *
     * @return void
     */
    public function testRuleAppliesToIdenticalVariableOnlyOneTime()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(2));
        $rule->apply($this->getMethod());
    }

    /**
     * testRuleAppliesToIdenticalVariablesInDifferentContextsSeveralTimes
     *
     * @return void
     */
    public function testRuleAppliesToIdenticalVariablesInDifferentContextsSeveralTimes()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', '');
        $rule->setReport($this->getReportMock(2));

        $class = $this->getClass();
        $rule->apply($class);

        foreach ($class->getMethods() as $method) {
            $rule->apply($method);
        }
    }

    /**
     * testRuleNotAppliesToVariablesFromExceptionsList
     *
     * @return void
     */
    public function testRuleNotAppliesToVariablesFromExceptionsList()
    {
        $rule = new ShortVariable();
        $rule->addProperty('minimum', 3);
        $rule->addProperty('exceptions', 'id');
        $rule->setReport($this->getReportMock(0));

        $rule->apply($this->getClass());
    }
}
