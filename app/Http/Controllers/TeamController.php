<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Models\TeamConsultant;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function createTeam(TeamRequest $request)
    {
        $teamData = [
            'name' => $request->name,
            'sales_manager_id' => $request->sales_manager_id
        ];

        $team = Team::create($teamData);

        $consultantIds = $request->consultantIds; // array of ids

        foreach($consultantIds as $consultant){
            TeamConsultant::create([
                'team_id' => $team->id,
                'consultant_id' => $consultant
            ]);
        }

        return redirect()->back()->with('message', 'Team wurde erfolgreich erstellt.');
    }

    public function deleteTeam($teamId)
    {
        $teamConsultants = TeamConsultant::where('team_id', $teamId)->get();

        foreach($teamConsultants as $teamConsultant){
            TeamConsultant::where('id', $teamConsultant->id)->delete();
        }

        Team::where('id', $teamId)->delete();

        return redirect()->back()->with('message', 'Team wurde erfolgreich gelöscht.');
    }

    public function showTeamById($teamId)
    {
        $team = Team::where('id', $teamId)->first();
        $teamConsultants = TeamConsultant::where('team_id', $teamId)->get();

        return [
            'team' => $team,
            'teamConsultants' => $teamConsultants
        ];
    }

    public function updateTeam($teamId, Request $request)
    {
        $team = Team::where('id', $teamId)->first();

        $dataForUpdate = [
            'name' => $request->name,
            'sales_manager_id' => $request->sales_manager_id
        ];

        $team->update($dataForUpdate);

        $teamConsultants = TeamConsultant::where('team_id', $teamId)->get();

        if($teamConsultants){
            foreach($teamConsultants as $teamConsultant){
                TeamConsultant::where('id', $teamConsultant->id)->delete();
            }

            Team::where('id', $teamId)->delete();
        }

        $consultantIds = $request->consultantIds; // array of ids

        foreach($consultantIds as $consultant){
            TeamConsultant::create([
                'team_id' => $team->id,
                'consultant_id' => $consultant
            ]);
        }

        return redirect()->back()->with('message', 'Team wurde erfolgreich aktualisiert.');
    }
}
