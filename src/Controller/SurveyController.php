<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Question;
use App\Entity\Survey;
use App\Form\SurveyType;
use App\Form\QuestionType;


/**
 * @Route("/api/survey", name="survey")
 */
class SurveyController extends AbstractController
{
    /**
     * @Route("/show", name="index",methods={"GET"})
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $surveys=$em->getRepository(Survey::class)->findAll();

        $surs=array();
        foreach($surveys as $obj){
            $surs = array_merge($surs,[
                "name"=>$obj->getName(),
                "questions"=>$obj->getQuestions(),
                "created"=>$obj->getCreatedAt(),
                "updated"=>$obj->getUpdateAt(),
                "dating"=>$obj->getRating(),
            ]);
        }


        return $this->json([
            'surveys' => $surs
        ]);
    }

    /**
     * @Route("/create",
     *      name="create_survey",methods={"POST"})
     */
    public function create(Request $request)
    {
        try {
            
                $em = $this->getDoctrine()->getManager();
                $code = 200;
                $error = false;    

                $survey = new Survey();
                $body = $request->getContent();
                $data = json_decode( $body,true );

                $survey->setUser($this->getUser());

                
                $form = $this->createForm( SurveyType::class, $survey );
                $form->submit($data);

                
                $em->persist($survey);

                $q = \count($data['questions']);
                if( $q>0 ){
                    foreach($data['questions'] as $qu ){
                        $question = new Question();
                        $survey->addQuestion($question);
                        $question->setBulleted(json_encode($qu['bulleted']));
                        $form = $this->createForm( QuestionType::class, $question );
                        $form->submit($qu);
                        $em->persist($question);
                    }
                }


                 $em->flush();

        } catch (Exception $ex) {
            $code = 403;
            $error = true;
            $message = "An error has occurred trying to register the survey - Error: {$ex->getMessage()}";    
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? 'Survey created' : $message,
        ];
        
        return $this->json($response);
    }


    /**
     * @Route("/delete",
     *      name="delete",methods={"DELETE"})
     */
    public function delete()
    {

    }

    /**
     * You can decide to use PUT ot PATCH is your choice
     * @Route("/update",
     *      name="delete",methods={"PUT"})
     */
    public function update()
    {

    }
}
