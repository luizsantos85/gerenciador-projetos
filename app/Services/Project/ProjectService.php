<?php

namespace App\Services\Project;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function insertProject(array $data): array
    {
        try {
            DB::beginTransaction();
            $project = Project::create($data);
            DB::commit();

            return ['ok' => true, 'project' => $project];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['ok' => false, 'message' => $e->getMessage()];
        }
    }

    public function updateProject(Project $project, array $data): array
    {
        try {
            DB::beginTransaction();
            $project->update($data);
            DB::commit();

            return ['ok' => true, 'project' => $project];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['ok' => false, 'message' => $e->getMessage()];
        }
    }

    public function deleteProject(Project $project): array
    {
        try {
            DB::beginTransaction();
            $project->delete();
            DB::commit();

            return ['ok' => true];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['ok' => false, 'message' => $e->getMessage()];
        }
    }
}
