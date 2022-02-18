<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\CumulativeStudy;
use App\Models\Course;
use PDF;

class KelasSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {        
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', $id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $id)
                                        ->distinct()
                                        ->get();

        if(date('m') <= 06 ){
            $cumulative_studies = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                                ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                                ->where('id_santri', $id)
                                                ->where('semester', 'Genap')
                                                ->where('year', date('Y')-1 . '/' . date('Y'))
                                                ->orderBy('sem')
                                                ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $id)
                                        ->where('semester', 'Genap')
                                        ->where('year', date('Y')-1 . '/' . date('Y'))
                                        ->distinct()
                                        ->get();
    
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', $id)
                                    ->where('semester', 'Genap')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->distinct()
                                    ->get();
    
        }elseif(date('m') > 06 ){
            $cumulative_studies = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                                ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                                ->where('id_santri', $id)
                                                ->where('semester', 'Ganjil')
                                                ->where('year', date('Y') . '/' . date('Y')+1)
                                                ->orderBy('sem')
                                                ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $id)
                                        ->where('semester', 'Ganjil')
                                        ->where('year', date('Y') . '/' . date('Y')+1)
                                        ->distinct()
                                        ->get();
    
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', $id)
                                    ->where('semester', 'Ganjil')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->distinct()
                                    ->get();
        }

        return view('santri.kelas', compact('cumulative_studies', 'filter_semesters', 'filter_years', 'semesters', 'years'));
    }

    public function filterKelas(Request $request)
    {
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', $request->id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $request->id)
                                        ->distinct()
                                        ->get();

        $cumulative_studies = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                            ->where('id_santri', $request->id)
                                            ->where('semester', $request->semester)
                                            ->where('year', $request->tahun_ajaran)
                                            ->orderBy('sem')
                                            ->get();
                
        $semesters = CumulativeStudy::select('semester')
                                    ->where('id_santri', $request->id)
                                    ->where('semester', $request->semester)
                                    ->distinct()
                                    ->get();
        
        $years = CumulativeStudy::select('year')
                                ->where('id_santri', $request->id)
                                ->where('year', $request->tahun_ajaran)
                                ->distinct()
                                ->get();

        return view('santri.kelas', compact('cumulative_studies', 'filter_semesters', 'filter_years', 'semesters', 'years'));
    }

    public function formCreate($id)
    {
        if(date('m') <= 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->orderBy('sem')
                                                ->where('id_santri', $id)
                                                ->where('semester', 'Genap')
                                                ->where('year', date('Y')-1 . '/' . date('Y'))
                                                ->get();

        }elseif(date('m') > 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->orderBy('sem')
                                                ->where('id_santri', $id)
                                                ->where('semester', 'Ganjil')
                                                ->where('year', date('Y') . '/' . date('Y')+1)
                                                ->get();
        }

        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->orderBy('sem')
                        ->get();

        return view('santri.tambah-santri-kelas', compact('cumulativestudys', 'courses', 'id'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_santri' => 'required', 'number',
            'id_course' => 'required', 'number',
        ]);

        if(date('m') == 01 || date('m') == 07){
            if(date('m') <= 06 ){
                CumulativeStudy::firstOrCreate([
                    'year' => date('Y')-1 . '/' . date('Y'),
                    'semester' => 'Genap',
                    'id_santri' => $request->id_santri,
                    'id_course' => $request->id_course,
                ]);
        
            }elseif(date('m') > 06 ){
                CumulativeStudy::firstOrCreate([
                    'year' => date('Y') . '/' . date('Y')+1,
                    'semester' => 'Ganjil',
                    'id_santri' => $request->id_santri,
                    'id_course' => $request->id_course,
                ]);
            }
        }

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect()->route('santri.kelas.form-create', [$request->id_santri]);
    }

    public function delete($id)
    {
        $id_santri = 0;
        foreach(CumulativeStudy::where('id_cumulative_study', $id)->get() as $cumulativestudys){
            $id_santri = $cumulativestudys->id_santri;
        }

        if(date('m') == 01 || date('m') == 07){
            CumulativeStudy::where('id_cumulative_study', $id)->delete();
        }

        Session::flash('hapus','Data Berhasil Dihapus!');
        
        return redirect()->route('santri.kelas.form-create', [$id_santri]);
    }

    public function detail($id)
    {
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('id_course', $id)
                        ->get();

        return view('santri.detail-kelas', compact('courses'));
    }

    public function cetakKelas(Request $request)
    {
        $cumulative_studies = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                            ->where('id_santri', $request->id_ustadz)
                                            ->where('semester', $request->semester)
                                            ->where('year', $request->year)
                                            ->orderBy('semester')
                                            ->get();

        $pdf = PDF::loadview('santri.cetak-kelas', compact('cumulative_studies'));

        return $pdf->stream();
    }
}
