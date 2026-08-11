use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

# rota: Route::get('/livros/excel', [LivroController::class,'excel']);
public function excel(Request $request)
{
    if ($request->has('search')) {
        $livros = Livro::where('titulo', 'like', '%' . $request->search . '%')->get();
    } else {
        $livros = Livro::all();
    }

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Cabeçalho
    $sheet->fromArray([
        ['Título', 'Autor', 'Ano']
    ]);

    // Dados
    $linha = 2;
    foreach ($livros as $livro) {
        $sheet->fromArray([
            $livro->titulo,
            $livro->autor,
            $livro->ano,
        ], null, "A{$linha}");

        $linha++;
    }

    $writer = new Xlsx($spreadsheet);

    return response()->streamDownload(
        fn() => $writer->save('php://output'),
        'livros.xlsx'
    );
}
