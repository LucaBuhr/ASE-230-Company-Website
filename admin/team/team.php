<?php
class TeamUtil {
    private static $filePath = 'team.json';

    public static function readTeam() {
        $jsonData = file_get_contents(self::$filePath);
        return json_decode($jsonData, true);
    }

    public static function createMember($member) {
        $team = self::readTeam();
        array_push($team['team'], $member);
        file_put_contents(self::$filePath, json_encode($team));
    }

    public static function updateMember($index, $newMemberData) {
        $team = self::readTeam();
        if (isset($team['team'][$index])) {
            $team['team'][$index] = $newMemberData;
            file_put_contents(self::$filePath, json_encode($team));
        }
    }

    public static function deleteMember($index) {
        $team = self::readTeam();
        if (isset($team['team'][$index])) {
            array_splice($team['team'], $index, 1);
            file_put_contents(self::$filePath, json_encode($team));
        }
    }
}
?>