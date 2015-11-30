<?php
namespace Modules\Taxonomy\Http\Controllers;

use App\Entities\Taxonomy;
use App\Entities\Taxonomyitem;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class TaxonomyController extends BaseController {

	/**
	 * @param Request $request
	 * @return mixed
	 */
	/*TAXONOMY*/
	public function index(Request $request)
	{
		$limit = 5;
		$request = $request->all();
		$page = isset($request['page'])?$request['page']:1;
		$order = isset($request['order'])?$request['order']:'asc';
		$sort = isset($request['sort'])?$request['sort']:'';
		$start = $page*$limit - $limit;
		$objVocabulary = new Taxonomy();
		if(isset($request['name'])){
			$objVocabulary = $objVocabulary->where('name','like','%'.$request['name'].'%');
		}
		$paging = $objVocabulary->paginate($limit);


		$objVocabulary = new Taxonomy();
		if(isset($request['name'])){
			$objVocabulary = $objVocabulary->where('name','like','%'.$request['name'].'%');
		}
		$objVocabulary = $objVocabulary->skip($start)->take($limit);
		switch($sort){
			case 'name':
				$objVocabulary = $objVocabulary->orderBy('name',$order);
				break;
		}
		$list = $objVocabulary->skip($start)->take($limit)->get();
		return view('taxonomy::list', array('paging' => $paging, 'listdata' => $list,'start' => $start,'request' => $request));
	}


	public function save(){

		$input = Input::all();
		$objVocabulary = new Taxonomy();
		$alias = $this->slug($input['name'],'taxonomy');
		if(isset($input['_id']) && $input['_id'] !=''){
			$vocabulary = $objVocabulary->where('id','=',$input['_id'])->first();
			$vocabulary->name = (isset($input['name']))?$input['name']:'';
			$vocabulary->alias = $alias;
			$vocabulary->description = isset($input['description'])?$input['description']:'';
			$vocabulary->save();
		}else{
			$objVocabulary->name = (isset($input['name']))?$input['name']:'';
			$objVocabulary->alias = $alias;
			$objVocabulary->description = isset($input['description'])?$input['description']:'';
			$objVocabulary->save();
		}
		return response()->json('1');
	}

	public function get_taxonomy(){
		$objVocabulary = new Taxonomy();
		$input = Input::all();

		$objVocabulary = $objVocabulary->where('id','=',$input['id']);
		$vocabulary = $objVocabulary->get()->first();
		echo json_encode($vocabulary);die;


	}

	public function delete_taxonomy()
	{
		$input = Input::all();
		foreach($input['aids'] as $v){
			$objLocation = new Taxonomy();
			$objLocation->destroy($v);
		}
		die('1');
	}
	/*END TAXONOMY*/


	/*TAXONOMY ITEM*/
	/*TAXONOMY ITEM*/
	public function taxonomyitem(Request $request,$id){

		$limit = 500;
		$request = $request->all();
		$objTaxonomy  = new Taxonomy();
		$vocabulary = $objTaxonomy->where('id','=',$id)->first();


		$page = isset($request['page'])?$request['page']:1;
		$order = isset($request['order'])?$request['order']:'asc';
		$sort = isset($request['sort'])?$request['sort']:'';
		$start = $page*$limit - $limit;
		$objTaxonomyitem = new Taxonomyitem();
		$query = $objTaxonomyitem->where('vid','=',$id);
		if(isset($request['name'])){
			$query = $query->where('name','like','%'.$request['name'].'%');
		}

		$paging = $objTaxonomyitem->paginate($limit);
		switch($sort){
			case 'name':
				$query = $query->orderBy('name',$order);
				break;
		}

		$list = $query->skip($start)->take($limit)->get();

		//pr($list);die;
		$listdatas = array();
		foreach($list as $k => $v){
			$tmp['id'] = $v['id'];
			$tmp['name'] = $v['name'];
			$tmp['parent'] = $v['parent'];
			$listdatas[$k] = $tmp;
		}

		$html = '';
		$tree =array();
		$listdatas1  = $listdatas;
		$listree = $this->listtree($listdatas1,0,$tree);
		return view('taxonomy::list_item', array('paging' => $paging,'vocabulary' => $vocabulary, 'listree' => $listree, 'listdata' => $listree, 'items' => $this->printlist($listdatas,0,$html),'start' => $start,'request' => $request, 'vid' => $id));
	}

	public function save_taxonomyitem(){
		$input = Input::all();

		$objVocabularyerm = new Taxonomyitem();
		$alias = $this->slug($input['name'],'taxonomyitem');

		if(isset($input['_id']) && $input['_id'] !=''){
			$objVocabularyerm = $objVocabularyerm->where('id','=',$input['_id'])->first();
			$objVocabularyerm->name = (isset($input['name']))?$input['name']:'';
			$objVocabularyerm->alias = $alias;
			$objVocabularyerm->vid = $input['vid'];
			$objVocabularyerm->parent = (isset($input['parent']) && $input['parent'] !='')?$input['parent']:0;
			$objVocabularyerm->save();

		}else{
			$objVocabularyerm->name = (isset($input['name']))?$input['name']:'';
			$objVocabularyerm->alias = $alias;
			$objVocabularyerm->vid = $input['vid'];
			$objVocabularyerm->parent = (isset($input['parent']) && $input['parent'] !='')?$input['parent']:0;
			$objVocabularyerm->save();

		}

		return response()->json('1');
	}

	public function get_taxonomyitem(){
		$objVocabularyterm = new Taxonomyitem();
		$input = Input::all();

		$objVocabularyterm = $objVocabularyterm->where('id','=',$input['id']);
		$Vocabularyterm = $objVocabularyterm->get()->first();
		echo json_encode($Vocabularyterm);die;



	}
	public function delete_taxonomyitem(){
		$input = Input::all();
		foreach($input['aids'] as $v){
			$objVocabularyterm  = new Taxonomyitem();
			$objVocabularyterm->destroy($v);
			$this->deteleteall($v);
		}
		die('1');
	}

	public function deteleteall($idtree){
		$objTerm = new Taxonomyitem();
		$terms = $objTerm->where('parent','=',$idtree)->get();
		foreach($terms as $v){
			$v->delete();
			$this->deteleteall($v['id']);
		}

	}
	/*END TAXONOMY ITEM*/

	public function listtree($listdata,$parent = 0,&$tree,$sp=''){
		if($parent == 0){
			$sp = '';
		}else{
			$sp =$sp.' - ';
		}
		foreach($listdata as $k => $v){
			if($v['parent'] == $parent){
				$v['nameold'] = $v['name'];
				$v['name'] = $sp.$v['name'];
				$tree[] =$v;
				unset($listdata[$k]);
				$this->listtree($listdata,$v['id'],$tree,$sp);
			}
		}
		return $tree;
	}
	public function printlist($listdata,$parent = 0,&$html,$sp=''){
		if($parent == 0){
			$sp = '';
		}else{
			$sp =$sp.' - ';
		}
		foreach($listdata as $k => $v){
			if($v['parent'] == $parent){
				$v['nameold'] = $v['name'];
				$v['name'] = $sp.$v['name'];

				$html.=view('taxonomy::item_list_term',array('v' => $v))->render();
				unset($listdata[$k]);
				$this->printlist($listdata,$v['id'],$html,$sp);
			}
		}
		return $html;
	}





}