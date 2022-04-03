<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function index()
    {        
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', Auth::guard('santri')->user()->id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', Auth::guard('santri')->user()->id)
                                        ->distinct()
                                        ->get();

        if(date('m') <= 06 ){
            $cumulative_studies = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                                                ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                                ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                                ->where('id_santri', Auth::guard('santri')->user()->id)
                                                ->where('semester', 'Genap')
                                                ->where('year', date('Y')-1 . '/' . date('Y'))
                                                ->orderBy('grade_name')
                                                ->orderBy('grade_number')
                                                ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', Auth::guard('santri')->user()->id)
                                        ->where('semester', 'Genap')
                                        ->where('year', date('Y')-1 . '/' . date('Y'))
                                        ->distinct()
                                        ->get();
    
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', Auth::guard('santri')->user()->id)
                                    ->where('semester', 'Genap')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->distinct()
                                    ->get();
    
        }elseif(date('m') > 06 ){
            $cumulative_studies = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                                                ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                                ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                                ->where('id_santri', Auth::guard('santri')->user()->id)
                                                ->where('semester', 'Ganjil')
                                                ->where('year', date('Y') . '/' . date('Y')+1)
                                                ->orderBy('grade_name')
                                                ->orderBy('grade_number')
                                                ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', Auth::guard('santri')->user()->id)
                                        ->where('semester', 'Ganjil')
                                        ->where('year', date('Y') . '/' . date('Y')+1)
                                        ->distinct()
                                        ->get();
    
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', Auth::guard('santri')->user()->id)
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
                                            ->where('id_santri', Auth::guard('santri')->user()->id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', Auth::guard('santri')->user()->id)
                                        ->distinct()
                                        ->get();

        $cumulative_studies = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                            ->where('id_santri', Auth::guard('santri')->user()->id)
                                            ->where('semester', $request->semester)
                                            ->where('year', $request->tahun_ajaran)
                                            ->orderBy('grade_name')
                                            ->orderBy('grade_number')
                                            ->get();
                
        $semesters = CumulativeStudy::select('semester')
                                    ->where('id_santri', Auth::guard('santri')->user()->id)
                                    ->where('semester', $request->semester)
                                    ->distinct()
                                    ->get();
        
        $years = CumulativeStudy::select('year')
                                ->where('id_santri', Auth::guard('santri')->user()->id)
                                ->where('year', $request->tahun_ajaran)
                                ->distinct()
                                ->get();

        return view('santri.kelas', compact('cumulative_studies', 'filter_semesters', 'filter_years', 'semesters', 'years'));
    }

    public function formCreate()
    {
        if(date('m') <= 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->where('id_santri', Auth::guard('santri')->user()->id)
                                                ->where('semester', 'Genap')
                                                ->where('year', date('Y')-1 . '/' . date('Y'))
                                                ->get();

        }elseif(date('m') > 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->where('id_santri', Auth::guard('santri')->user()->id)
                                                ->where('semester', 'Ganjil')
                                                ->where('year', date('Y') . '/' . date('Y')+1)
                                                ->get();
        }

        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

        return view('santri.tambah-santri-kelas', compact('cumulativestudys', 'courses'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_course' => 'required', 'number',
        ]);

        if(date('m') == 01 || date('m') == 07){
            if(date('m') <= 06 ){
                CumulativeStudy::firstOrCreate([
                    'year' => date('Y')-1 . '/' . date('Y'),
                    'semester' => 'Genap',
                    'id_santri' => Auth::guard('santri')->user()->id,
                    'id_course' => $request->id_course,
                ]);
                CumulativeStudy::firstOrCreate([
                    'year' => date('Y')-1 . '/' . date('Y'),
                    'semester' => 'Ganjil',
                    'id_santri' => Auth::guard('santri')->user()->id,
                    'id_course' => $request->id_course,
                ]);
        
            }elseif(date('m') > 06 ){
                CumulativeStudy::firstOrCreate([
                    'year' => date('Y') . '/' . date('Y')+1,
                    'semester' => 'Ganjil',
                    'id_santri' => Auth::guard('santri')->user()->id,
                    'id_course' => $request->id_course,
                ]);
                CumulativeStudy::firstOrCreate([
                    'year' => date('Y') . '/' . date('Y')+1,
                    'semester' => 'Genap',
                    'id_santri' => Auth::guard('santri')->user()->id,
                    'id_course' => $request->id_course,
                ]);
            }

            Session::flash('tambah','Matapelajaran Berhasil Ditambahkan!');

        } else {
            Session::flash('hapus','Matapelajaran Gagal Ditambahkan!');
        }

        return redirect()->route('santri.kelas.form-create', [Auth::guard('santri')->user()->id])->with('tambah','Data Berhasil Ditambahkan!');
    }

    public function delete(Request $request)
    {
        if(date('m') == 01 || date('m') == 07){
            CumulativeStudy::where('id_cumulative_study', $request->id_cumulative_study)->delete();

            Session::flash('hapus','Matapelajaran Berhasil Dihapus!');

        } else {
            Session::flash('hapus','Matapelajaran Gagal Dihapus!');
        }
        
        return redirect()->route('santri.kelas.form-create', [Auth::guard('santri')->user()->id]);
    }

    public function cetakKelas(Request $request)
    {
        $cumulative_studies = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                            ->where('id_santri', Auth::guard('santri')->user()->id)
                                            ->where('semester', $request->semester)
                                            ->where('year', $request->year)
                                            ->orderBy('semester')
                                            ->get();

        $pdf = PDF::loadview('santri.cetak-kelas', compact('cumulative_studies'));

        return $pdf->stream();
    }
}
