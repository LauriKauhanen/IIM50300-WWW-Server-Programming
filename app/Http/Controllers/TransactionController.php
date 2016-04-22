<?php namespace PanamaBudget\Http\Controllers;

use Illuminate\Http\Request;
use PanamaBudget\Http\Requests;
use PanamaBudget\Transaction;
use PanamaBudget\User;
use PanamaBudget\Type;
use Auth;

class TransactionController extends Controller
{

    private $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$user_id = Auth::user()->id;
        return Transaction::where('user_id', $user_id)
			->join('types', 'transactions.type', '=', 'types.id')
			->select('types.name as type','transactions.id','transactions.date','transactions.amount','transactions.description')
			->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
		$input = $this->request->all();
		$input['user_id'] = Auth::user()->id;
		$transaction = new Transaction($input);
		if (!$transaction->save()) {
				abort(500, "Saving failed.");
		}
		return $transaction;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Transaction::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $transaction = Transaction::find($id);
        $transaction = Input::all();
        if (!$transaction->save()) {
            abort(500, "Saving failed");
        }
        return $transaction;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Transaction::destroy($id);
    }

}
