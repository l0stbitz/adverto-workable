<?php

namespace Adverto\AdminBundle\Form\JMP;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('reqId')
                ->add('title')
                ->add('titleSeo')
                ->add('salaryFrom')
                ->add('salaryTo')
                ->add('description')
                ->add('applyEmails')
                ->add('applyStart')
                ->add('applyFinish')
                ->add('datePosted')
                ->add('startDate')
                ->add('endDate')
                ->add('businessUnit')
                ->add('location')
                ->add('category')
                ->add('jobType')
                ->add('jobStatus')
                ->add('yearsOfExperience')
                ->add('careerLevel')
                ->add('careerAreas')
                ->add('educationLevel')
                ->add('salaryType');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Adverto\AdminBundle\Entity\JMP\Job'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'adverto_adminbundle_jmp_job';
    }

}
