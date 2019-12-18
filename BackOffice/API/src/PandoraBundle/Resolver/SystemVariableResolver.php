<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

class SystemVariableResolver extends AbstractResolver
{
    public function getSystemVariableByName($variableName = ''){
        $this->query = $this->default_em->createQueryBuilder();
        return $this->query->select('a.VariableValue')->from('AppBundle:SystemVariables', 'a')->where('a.VariableName = :VariableName')->setParameters([':VariableName' => $variableName])->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
    }
}