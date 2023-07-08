<?php
class Home 
{
    function __construct(){
    }
    public function homeview(){
       $data.=$this->slider();
       $data.=$this->searchbar();
       $data.=$this->popular_exams();
       //$data.=$this->category_exams();
       $data.=$this->explore_exams();
       $data.=$this->newexamdata();
       $data.=$this->welcome();
       $data.=$this->features();
       $data.=$this->testimonials();
       return $data;
    }
    protected function newexamdata(){
      $html="
      <section class='exp_by_exms'>
      <div class='container'>
      <div class='row'>
      <div class='col-md-4'>
      <h2> Explore By Exams</h2>
                <div id='accordion' class='card accordion-style'>
                    <div class='card'>
                        <div class='card-header' id='headingOne'>
                            <h5 class='mb-0'>
                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#collapseOne' aria-expanded='false' aria-controls='collapseOne'>Government Job Exams</button>
                            </h5>
                        </div>
                        <div id='collapseOne' class='collapse' aria-labelledby='headingOne' data-parent='#accordion' style=''>
                            <div class='card-body position-relative'>       
                            <ul>
                             <li>Banking</li>
                             <li>SSC</li>
                             <li>UPSC</li>
                             <li>Defence</li>
                            </ul> 
                            </div>
                        </div>
                    </div>
                    <div class='card'>
                        <div class='card-header' id='headingTwo'>
                            <h5 class='mb-0'>
                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>Private Job Exams</button>
                            </h5>
                        </div>
                        <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordion'>
                            <div class='card-body position-relative'>
                            <ul>
                             <li>Test 1</li>
                             <li>Test 2</li>
                             <li>Test 3</li>
                             <li>Test 4</li>
                            </ul> 
                            </div>
                        </div>
                    </div>
                    <div class='card'>
                        <div class='card-header' id='headingThree'>
                            <h5 class='mb-0'>
                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>Undergraduate Entrance Exams</button>
                            </h5>
                        </div>
                        <div id='collapseThree' class='collapse' aria-labelledby='headingThree' data-parent='#accordion'>
                            <div class='card-body position-relative'>
                            <ul>
                             <li>JEE</li>
                             <li>NEET</li>
                             <li>Law</li>
                             <li>Test 4</li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class='card'>
                        <div class='card-header' id='headingFour'>
                            <h5 class='mb-0'>
                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#collapseFour' aria-expanded='false' aria-controls='collapseFour'>Gate & Engineering</button>
                            </h5>
                        </div>
        <div id='collapseFour' class='collapse' aria-labelledby='headingFour' data-parent='#accordion'>
          <div class='card-body position-relative'>
            <ul>
             <li>Electronics Engg</li>
             <li>Computer Science Engg</li>
             <li>Mechanical Engg</li>
             <li>Electrical Engg</li>
            </ul>  
                   </div>
                  </div>
                 </div>
                 <div class='card'>
                        <div class='card-header' id='headingFive'>
                            <h5 class='mb-0'>
                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#collapseFive' aria-expanded='false' aria-controls='collapseFive'>Management</button>
                            </h5>
                        </div>
        <div id='collapseFive' class='collapse' aria-labelledby='headingFive' data-parent='#accordion'>
          <div class='card-body position-relative'>
            <ul>
             <li>MBA Entrance</li>
             <li>Hotel Management</li>
             <li>Test 3</li>
             <li>Test 4</li>
            </ul>  
                   </div>
                  </div>
                 </div>
                 <div class='card'>
                        <div class='card-header' id='headingSix'>
                            <h5 class='mb-0'>
                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#collapseSix' aria-expanded='false' aria-controls='collapseSix'>Foreign Education</button>
                            </h5>
                        </div>
        <div id='collapseSix' class='collapse' aria-labelledby='headingSix' data-parent='#accordion'>
          <div class='card-body position-relative'>
            <ul>
             <li>GRE</li>
             <li>GMAT</li>
             <li>Test 3</li>
             <li>Test 4</li>
            </ul>  
                   </div>
                  </div>
                 </div>
                </div>
             </div>
            <div class='col-md-8'>
               <div class='group has-search'>
    <span class='fa fa-search control-feedback'></span>
    <input type='text' class='control' placeholder='Find your exam'>
  </div>
		</div>
 
             </div>
                  </div> 
                </div>         
              </div>         
  </section>";
     /* $html.=html_writer:: start_tag('div',array('class'=>'row'));
       $html .= "Test";
     $html.=html_writer::end_tag('div');*/
      return $html;
    }

    protected function slider(){
      global $DB, $OUTPUT, $PAGE, $USER,$CFG;
       
      $html.= html_writer:: start_tag('div',array('class'=>'row'));
       
      $topbardata = $DB->get_record('customhmp_slider_content',array('id'=>'1'));
      $sug=array(unserialize($topbardata->slider_content));
     
      foreach ($sug as $val){ $descpt= $val['text'];}
      $html.=$descpt; 
      $html.=html_writer::end_tag('div');
      $html.=html_writer::end_tag('div');
      $html.=html_writer:: start_tag('div',array('class'=>'banner-image'));
      $html.=html_writer:: empty_tag('img',array('src'=>$CFG->wwwroot.'/blocks/customhomepage/assets/banner-img.png','class'=>'teacher'));
      $html.=html_writer::end_tag('div');
      $html.=html_writer::end_tag('section');
      return $html;
      
    }

    protected function searchbar(){
      global $DB, $OUTPUT, $PAGE, $USER,$CFG;
      $html .= html_writer:: start_tag('section',array('class'=>'exp_exam','style'=>'padding-bottom: 0px;'));
      $html .= html_writer:: start_tag('div',array('class'=>'container'));
      $html .= html_writer:: start_tag('div',array('class'=>'row'));
      $html .= html_writer:: start_tag('div',array('class'=>'col-md-12'));
      $html .= html_writer:: start_tag('div',array('class'=>'col-md-6 offset-md-3 col-12'));
      $html .= html_writer:: start_tag('div',array('class'=>'sear_ch'));
      $html .= html_writer:: empty_tag('input',array('type'=>'text','name'=>'','placeholder'=>'Search','id'=>'searchdata','autocomplete'=>'off'));
      $html .= html_writer:: start_tag('div',array('id'=>'filterSearchdata'));
      $html .= html_writer::end_tag('div');
      $html .= html_writer:: start_tag('svg',array('role'=>'presentation','class'=>'i-search','viewBox'=>'0 0 32 32','width'=>'18','height'=>'18','fill'=>'none','stroke'=>'currentcolor','stroke-linejoin'=>'round','stroke-width'=>'3'));
      $html .= html_writer::empty_tag('circle',array('cx'=>'14','cy'=>'14','r'=>'12'));
      $html .= html_writer::empty_tag('path',array('d'=>'M23 23 L30 30'));
      $html .= html_writer::end_tag('svg');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('section');
      return $html;

    }

      protected function popular_exams(){
      global $DB, $OUTPUT, $PAGE, $USER,$CFG;
      $html .= html_writer:: start_tag('section',array('class'=>'popular'));
      $html .= html_writer:: start_tag('div',array('class'=>'container'));
      $html .= html_writer:: start_tag('div',array('class'=>'row'));
      $html .= html_writer:: start_tag('div',array('class'=>'col-md-12'));
      $html .= html_writer:: start_tag('h2',array('class'=>'ng-binding Nhm_heading-1 Nhm_heading-2 mt-0'));
      $html .= "Popular Exams";
      $html .= html_writer::end_tag('h2');
      $html .= html_writer::end_tag('div');
      $html .= html_writer:: start_tag('div',array('class'=>'col-md-12'));
      $html .= html_writer:: start_tag('div',array('class'=>'cours_e'));
       $dataquery=$DB->get_records_sql("select mst.id,mst.iconfiletype,f.filename,mst.classname,mst.title,f.pathnamehash,scs.slug as thirdslug,scc.slug as secondslug,scf.slug as firstslug from {searchda_third} as mst 
        left join {searchda_categories_seo} as scs on mst.id=scs.th_id 
left join {searchda_categories_secondseo} as scc on mst.subid=scc.second_id
left join {searchda_categories_firstseo} as scf on scc.first_id=scf.first_id
        left JOIN {files} as f on mst.icon_file=f.itemid where mst.status='0' and mst.popular_exams='1' and f.filename!='.' ORDER BY mst.sorting ASC");
      //$dataquery=$DB->get_records('searchda_third',array('status'=>0,'popular_exams'=>1),'sorting asc');
      $i=1;
      foreach($dataquery as $value)
      { 
      $html .= html_writer:: start_tag('div',array('class'=>'Nhm-popularDiv ng-scope','ng-repeat'=>'popularExam in popularExamsData')); 
      $html .= html_writer:: start_tag('a',array('class'=>'Nw_ExmPopular','href'=>$CFG->wwwroot.'/exam/'.$value->firstslug.'/'.$value->secondslug.'/'.$value->thirdslug,'target'=>'_top'));
      $html .= html_writer:: start_tag('span',array('class'=>"Nw_ExmPoprIcon"));
      if($value->iconfiletype=='svg')
      {
        //$fileinfo=$DB->get_record_sql("SELECT * FROM {files} WHERE itemid=$value->icon_file and filename!='.'");
        //if(!empty($fileinfo->filename))
        if(!empty($value->filename))
        {
          $backgrounddata=$CFG->wwwroot.'/local/file.php/'.$value->pathnamehash.'/0/'.$value->filename;
          $html .= html_writer:: empty_tag('img',array('class'=>'img-responsive lozad', 'src'=>$backgrounddata));
        }
      }
      if($value->iconfiletype=='fontawesome')
      { 
        $html .= html_writer:: start_tag('i',array('aria-hidden'=>'true','class'=>'fa' . $value->classname));
        $html .= html_writer::end_tag('i');
      } 
      $html .= html_writer::end_tag('span');
      $html .= html_writer:: start_tag('p',array('class'=>'ng-binding','ng-bind'=>'popularExam.name'));
      $html .= $value->title;
      $html .= html_writer::end_tag('p');
      $html .= html_writer::end_tag('a');
      $html .= html_writer::end_tag('div');
      }
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('div');
      $html .= html_writer::end_tag('section');
      return $html;
    }

    protected function explore_exams(){
      global $DB, $OUTPUT, $PAGE, $USER,$CFG;
      $html .= html_writer:: start_tag('section',array('class'=>'exp_exam'));
      $html .= html_writer:: start_tag('div',array('class'=>'container'));
      $html .= html_writer:: start_tag('div',array('class'=>'row'));
      $html .= html_writer:: start_tag('div',array('class'=>'col-md-12'));
      $html .= html_writer:: start_tag('h2',array('class'=>'Nhm_heading-1 Nhm_heading-2 ng-binding'));
      $html .= "Explore your Exam";
      $html .= html_writer::end_tag('h2');
      $html .= html_writer:: start_tag('div',array('class'=>'owl-carousel owl-theme t_next_b myexplore'));
      $dataquery = $DB->get_records_sql("select sc.id,sc.iconfiletype,f.filename,f.itemid,sc.icon_file,sc.classname,sc.title,f.pathnamehash from {searchda_categories} as sc left join {files} as f on sc.icon_file=f.itemid where f.filename!='.' and sc.status='0'");
      $i=1;
      foreach ($dataquery as $value) {
      $html .= html_writer:: start_tag('a',array('class'=>'item . if($i++==1){ "current" }', 'data-toggle'=>'tab', 'data-id'=>$value->id, 'href'=>'#menu' . $value->id));
      if($value->iconfiletype=='svg'){
      {
          
          if(!empty($value->filename))
          {
            $backgrounddata=$CFG->wwwroot.'/local/file.php/'.$value->pathnamehash.'/0/'.$value->filename;
            $html .= html_writer:: empty_tag('img',array('class'=>'crasun_img', 'alt'=>'icon','src'=>$backgrounddata));
          }
        }
      if($value->iconfiletype=='fontawesome'){ 
        $html .= html_writer:: start_tag('i',array('aria-hidden'=>'true','class'=>'fa' . $value->classname));
        $html .= html_writer::end_tag('i');
      }
      $html .= $value->title;
      $html .= html_writer::end_tag('a');
    }
    }
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('class'=>'tab_contant_out'));
    $html .= html_writer:: start_tag('div',array('class'=>'tab-content'));
    $html .= html_writer:: start_tag('div',array('id'=>'loader'));
    $html .= html_writer:: start_tag('span',array('class'=>'loder'));
    $html .= html_writer:: empty_tag('img',array('alt'=>'gif','src'=>'../theme/lambda/layout/image/loading.gif'));
    $html .= html_writer::end_tag('span');
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('id'=>'menu1','class'=>'container tab-pane active'));
    $html .= html_writer:: start_tag('div',array('id'=>'exploredata'));
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div'); 
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('section');
    return $html;
      

    }
  protected function welcome(){
    global $DB, $OUTPUT, $PAGE, $USER,$CFG;
    $html .= html_writer:: start_tag('section',array('class'=>'bg-prepare'));
    $html .= html_writer:: empty_tag('img',array('src'=>'blocks/customhomepage/assets/cour_se_img.png','class'=>'img-fluid welcome_img','style'=>''));
    $html .= html_writer:: start_tag('div',array('class'=>'container-fluid'));
    $html .= html_writer:: start_tag('div',array('class'=>'row'));
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-7'));
    $html .= html_writer:: start_tag('div',array('class'=>'row'));
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-5 col-sm-6 col-12'));
	  $html .= html_writer:: start_tag('div',array('class'=>'prepare_test'));
    $html .= html_writer:: start_tag('p');
    $html .= html_writer:: end_tag('p');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-6 col-sm-6 col-12'));
    $html .= html_writer:: start_tag('div',array('class'=>'prepare_content'));
    $wel_comedata = $DB->get_record('customhmp_wel_come_to',array('id'=>'1'));
    $sug=array(unserialize($wel_comedata->wel_come_to));
    $descptionn= $sug[0]['text'];
    $html.=$descptionn;
    $html .= html_writer::end_tag('div');                   
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-4'));
    $html .= html_writer:: start_tag('div',array('class'=>'row bg-white text-center'));
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-6 col-sm-6'));
    $html .= html_writer:: start_tag('div',array('class'=>'counter-image'));
    $html .= html_writer:: empty_tag('img',array('src'=>'blocks/customhomepage/assets/counterimg.jpeg','class'=>'img-fluid'));
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-6 col-sm-6'));
    $html .= html_writer:: start_tag('div',array('class'=>'counter-image'));
    $html .= html_writer:: empty_tag('img',array('src'=>'blocks/customhomepage/assets/welcome2.png','class'=>'img-fluid'));
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('class'=>'bg-white row'));
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-4 col-sm-4'));
    $html .= html_writer:: start_tag('div',array('class'=>'bg-prepare counter-heading'));
    $html .= html_writer:: start_tag('h1');
    $html .= html_writer:: start_tag('span',array('class'=>'counter'));
    $html .="2";
    $html .= html_writer::end_tag('span');
    $html .= html_writer:: start_tag('span');
    $html .="K+";
    $html .= html_writer::end_tag('span');
    $html .= html_writer:: end_tag('h1');
    $html .= html_writer:: start_tag('p');
    $html .="EXAMS";
    $html .= html_writer:: end_tag('p');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-4 col-sm-4'));
    $html .= html_writer:: start_tag('div',array('class'=>'bg-prepare counter-heading'));
    $html .= html_writer:: start_tag('h1');
    $html .= html_writer:: start_tag('span',array('class'=>'counter'));
    $html .="90";
    $html .= html_writer::end_tag('span');
    $html .= html_writer:: start_tag('span');
    $html .="%";
    $html .= html_writer::end_tag('span');
    $html .= html_writer:: end_tag('h1');
    $html .= html_writer:: start_tag('p');
    $html .="Graduates";
    $html .= html_writer:: end_tag('p');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('div',array('class'=>'col-md-4 col-sm-4'));
    $html .= html_writer:: start_tag('div',array('class'=>'bg-prepare counter-heading'));
    $html .= html_writer:: start_tag('h1');
    $html .= html_writer:: start_tag('span');
    $html .="500";
    $html .= html_writer::end_tag('span');
    $html .= html_writer:: start_tag('span');
    $html .="+";
    $html .= html_writer::end_tag('span');
    $html .= html_writer:: end_tag('h1');
    $html .= html_writer:: start_tag('p');
    $html .="Graduates";
    $html .= html_writer:: end_tag('p');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('section');
    return $html;
  }
protected function features(){
  global $DB, $OUTPUT, $PAGE, $USER,$CFG;
  $html .= html_writer:: start_tag('section',array('class'=>'pt-5'));
  $html .= html_writer:: start_tag('div',array('class'=>'container'));
  $html .= html_writer:: start_tag('div',array('class'=>'pb-4 row'));
  $html .= html_writer:: start_tag('div',array('class'=>'col-md-12'));
  $html .= html_writer:: start_tag('div',array('class'=>'upcoming-header'));
  $html .= html_writer:: start_tag('div',array('class'=>'headings'));
  $html .= html_writer:: start_tag('h2',array('class'=>'text-center'));
  $html .= html_writer:: start_tag('span',array('class'=>'bold_heading'));
  $html .= html_writer::end_tag('span');
  $html .="FEATURES";
  $html .= html_writer:: end_tag('h2');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer:: start_tag('div',array('class'=>'row pt-4'));
  $awesome_featuresdata = $DB->get_record('customhmp_awesome_features',array('id'=>'1'));
  $html .= html_writer:: start_tag('div',array('class'=>'col-md-4'));
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box mt-4 text-center'));
  $html .= html_writer:: start_tag('span',array('class'=>'feature-icon'));
  $html .= html_writer:: empty_tag('img',array('src'=>'/blocks/customhomepage/assets/Icon%20metro-books.svg','class'=>'img-fluid'));
  $html .= html_writer::end_tag('span');
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-header_top'));
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-header pb-3'));
  $html .= html_writer:: start_tag('h4');
  $html .= $awesome_featuresdata->awesome_features;
  $html .= html_writer:: end_tag('h4');
  $html .= html_writer::end_tag('div');
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-content pb-4'));
  $data=array(unserialize($awesome_featuresdata->awesome_features_desc));
  $html .= $data[0]['text'];
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer:: start_tag('div',array('class'=>'col-md-4'));
  $awesome_featuresdatatwo=$DB->get_record('customhmp_awesome_features',array('id'=>'2'));
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box mt-4 text-center'));
  $html .= html_writer:: start_tag('span',array('class'=>'feature-icon'));
  $html .= html_writer:: empty_tag('img',array('src'=>'/blocks/customhomepage/assets//Icon%20ionic-ios-time.svg','class'=>'img-fluid'));
  $html .= html_writer::end_tag('span');
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-header_top'));
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-header pb-3'));
  $html .= html_writer:: start_tag('h4');
  $html .=$awesome_featuresdatatwo->awesome_features;
  $html .= html_writer:: end_tag('h4');
  $html .= html_writer:: end_tag('div');
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-content pb-4'));
  $datatwo=array(unserialize($awesome_featuresdatatwo->awesome_features_desc));
  $ftwodesc=$datatwo[0]['text'];
  $html .= $ftwodesc; 
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer:: start_tag('div',array('class'=>'col-md-4'));
  $awesome_featuresdatathree=$DB->get_record('customhmp_awesome_features',array('id'=>'3')); 
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box mt-4 text-center'));
  $html .= html_writer:: start_tag('span',array('class'=>'feature-icon'));
  $html .= html_writer:: empty_tag('img',array('src'=>'/blocks/customhomepage/assets/Icon%20awesome-pen-fancy.svg','class'=>'img-fluid'));
  $html .= html_writer::end_tag('span');
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-header_top'));
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-header pb-3'));
  $html .= html_writer:: start_tag('h4');
  $html .= $awesome_featuresdatathree->awesome_features;
  $html .= html_writer:: end_tag('h4');
  $html .= html_writer::end_tag('div');
  $html .= html_writer:: start_tag('div',array('class'=>'feature_box-content pb-4'));
  $datathree=array(unserialize($awesome_featuresdatathree->awesome_features_desc));
  $fthreedesc=$datathree[0]['text'];
  $html .= $fthreedesc; 
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('section');
  return $html;
  }
  
  protected function testimonials(){
  global $DB, $OUTPUT, $PAGE, $USER,$CFG;
  $html .= html_writer:: start_tag('section',array('class'=>'pb-4 mt-5 pt-5'));
  $html .= html_writer:: start_tag('div',array('class'=>'container'));
  $html .= html_writer:: start_tag('div',array('class'=>'pb-4 row'));
  $html .= html_writer:: start_tag('div',array('class'=>'col-md-12'));
  $html .= html_writer:: start_tag('div',array('class'=>'upcoming-header'));
  $html .= html_writer:: start_tag('div',array('class'=>'headings'));
  $html .= html_writer:: start_tag('h2',array('class'=>'text-center'));
  $html .= html_writer:: start_tag('span',array('class'=>'bold_heading'));
  $html .= "STUDENTS";
  $html .= html_writer::end_tag('span');
  $html .= "TESTIMONIALS";
  $html .= html_writer:: end_tag('h2');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer::end_tag('div');
  $html .= html_writer:: start_tag('div',array('class'=>'row'));
  $html .= html_writer:: start_tag('div',array('class'=>'col-md-12'));
  $html .= html_writer:: start_tag('div',array('class'=>'carousel slide swipe_x testimonial4_control_button testimonial4_indicators thumb_scroll_x','data-duration'=>'2000','data-interval'=>'5000','data-pause'=>'hover','data-ride'=>'carousel','id'=>'testimonial4'));
  $html .= html_writer:: start_tag('div',array('class'=>'carousel-inner','role'=>'listbox'));
  $testimonialcontent=$DB->get_records_sql("select t.id,t.image_id,f.itemid,f.filename,f.pathnamehash,t.testimonial_content,t.name from {customhmp_testimonialcontent} as t left join {files} as f on t.image_id=f.itemid where f.filename!='.'");
  $i=1;
  foreach($testimonialcontent as $testimonialContentdata)
  {
    
	  if("1"==$i++){ 
    $html .= html_writer:: start_tag('div',array('class'=>'carousel-item active'));
    $html .= html_writer:: start_tag('div',array('class'=>'testimonial4_slide'));
    $html .= html_writer:: empty_tag('img',array('src'=>$CFG->wwwroot.'/local/file.php/'.$testimonialContentdata->pathnamehash.'/0/'.$testimonialContentdata->filename,'class'=>'img-circle img-fluid'));
    $sug=array(unserialize($testimonialContentdata->testimonial_content));
		$descptintest=$sug[0]['text'];
		$html .= $descptintest;
    $html .= html_writer:: start_tag('h4');
    $html .= $testimonialContentdata->name;
    $html .= html_writer:: end_tag('h4');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    }
		else
		{ 
    $html .= html_writer:: start_tag('div',array('class'=>'carousel-item'));
	  $html .= html_writer:: start_tag('div',array('class'=>'testimonial4_slide'));
    $html .= html_writer:: empty_tag('img',array('src'=>$CFG->wwwroot.'/local/file.php/'.$testimonialContentdata->pathnamehash.'/0/'.$testimonialContentdata->filename,'class'=>'img-circle img-fluid'));
	  $sug=array(unserialize($testimonialContentdata->testimonial_content));
	  $descptionnt=$sug[0]['text'];
    $html .= $descptionnt;
    $html .= html_writer:: start_tag('h4');
    $html .= $testimonialContentdata->name;
	  $html .= html_writer:: end_tag('h4');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
	  }
    }
    $html .= html_writer::end_tag('div');
    $html .= html_writer:: start_tag('a',array('class'=>'carousel-control-prev','data-slide'=>'prev','href'=>'#testimonial4'));
	  $html .= html_writer:: start_tag('span',array('class'=>'carousel-control-prev-icon'));
    $html .= html_writer::end_tag('span');
	  $html .= html_writer::end_tag('a'); 
	  $html .= html_writer:: start_tag('a',array('class'=>'carousel-control-next','data-slide'=>'next','href'=>'#testimonial4'));
	  $html .= html_writer:: start_tag('span',array('class'=>'carousel-control-next-icon'));
    $html .= html_writer::end_tag('span');
	  $html .= html_writer::end_tag('a'); 
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('div');
    $html .= html_writer::end_tag('section');
    return $html;
  }

}