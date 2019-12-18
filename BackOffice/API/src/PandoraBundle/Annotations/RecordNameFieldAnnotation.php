<?php
namespace PandoraBundle\Annotations;

/**
 * 
 * @Annotation
 * @Target({"METHOD","PROPERTY", "CLASS"})
 * 
 */
class RecordNameFieldAnnotation
{
	public $candidateRecordNameField;
}