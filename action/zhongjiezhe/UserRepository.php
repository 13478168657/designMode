<?php

namespace zhongjiezhe;

include_once 'Observer.php';
include_once 'EventDispatcher.php';
include_once 'User.php';
class UserRepository implements Observer{

    private $users = [];

    /**
     * Components can subscribe to events by themselves or by client code.
     */
    public function __construct()
    {
        events()->attach($this, "users:deleted");
    }

    /**
     * Components can decide whether they'd like to process an event using its
     * name, emitter or any contextual data passed along with the event.
     */
    public function update($event, $emitter, $data = null)
    {
        switch ($event) {
            case "users:deleted":
                if ($emitter === $this) {
                    return;
                }
                $this->deleteUser($data, true);
                break;
        }
    }

    // These methods represent the business logic of the class.

    public function initialize($filename)
    {
        echo "UserRepository: Loading user records from a file.\n";
        // ...
        events()->trigger("users:init", $this, $filename);
    }

    public function createUser($data, $silent = false)
    {
        echo "UserRepository: Creating a user.\n";

        $user = new User();
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(["id" => $id]);
        $this->users[$id] = $user;

        if (!$silent) {
            events()->trigger("users:created", $this, $user);
        }

        return $user;
    }

    public function updateUser(User $user, $data, $silent = false)
    {
        echo "UserRepository: Updating a user.\n";

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return null;
        }

        $user = $this->users[$id];
        $user->update($data);

        if (!$silent) {
            events()->trigger("users:updated", $this, $user);
        }

        return $user;
    }

    public function deleteUser(User $user, $silent = false)
    {
        echo "UserRepository: Deleting a user.\n";

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return;
        }

        unset($this->users[$id]);

        if (!$silent) {
            events()->trigger("users:deleted", $this, $user);
        }
    }
}