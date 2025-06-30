<?php

namespace App\Services;

use Google\Cloud\Firestore\FirestoreClient;

class FirebaseService
{
    protected $firestore;

    public function __construct()
    {
        // Initialize Firestore with credentials
        $this->firestore = new FirestoreClient([
            'projectId'   => config('services.firebase.project_id'),
            'keyFilePath' => base_path(config('services.firebase.credentials')),
        ]);
    }

    // Fetch all students
    public function getAllStudents()
    {
        return $this->firestore->collection('students')->documents();
    }

    // Add a new student
    public function addStudent(array $data)
    {
        return $this->firestore->collection('students')->add($data);
    }

    // Get a single student by ID
    public function getStudent($id)
    {
        return $this->firestore->collection('students')->document($id)->snapshot();
    }

    // Update a student
    public function updateStudent($id, array $data)
    {
        return $this->firestore->collection('students')->document($id)->set($data, ['merge' => true]);
    }

    // Delete a student
    public function deleteStudent($id)
    {
        return $this->firestore->collection('students')->document($id)->delete();
    }
}
