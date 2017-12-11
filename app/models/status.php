
<?php
class Status extends BaseModel{

    public $kayttaja_id, $lukuvinkki_id, $status;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Status');
        $query->execute();
        $rows = $query->fetchAll();
        $status = array();
        foreach ($rows as $row) {
            $status[] = new Status(array(
                'kayttaja_id' => $row['kayttaja_id'],
                'lukuvinkki_id' => $row['lukuvinkki_id'],
                'status' => $row['status']
            ));
        }
        return $status;
    }
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Status (kayttaja_id, lukuvinkki_id, status) VALUES (:kayttaja_id, :lukuvinkki_id, :status)');
        $query->execute(array(
            'kayttaja_id' => $this->kayttaja_id,
            'lukuvinkki_id' => $this->lukuvinkki_id,
            'status' => $this->status
        ));
        $query->fetch();

    }
    
    public static function findStatus($kayttaja_id, $lukuvinkki_id) {
        $query = DB::connection()->prepare('SELECT * FROM Status WHERE Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = :lukuvinkki_id');
        $query->execute(array('kayttaja_id' => $kayttaja_id, 'lukuvinkki_id' => $lukuvinkki_id));
        $row = $query->fetch();
        $status = array();
            if($row){
                $status = new Status(array(
                    'kayttaja_id' => $row['kayttaja_id'],
                    'lukuvinkki_id' => $row['lukuvinkki_id'],
                    'status' => $row['status']
                ));
                return $status;
            }
        return null;
    }
    
    //Palauttaa statuksen.
    public static function find($kayttaja_id, $lukuvinkki_id) {
        $query = DB::connection()->prepare('SELECT Status.* FROM Status WHERE Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = :lukuvinkki_id LIMIT 1');
        $query->execute(array('kayttaja_id' => $kayttaja_id, 'lukuvinkki_id' => $lukuvinkki_id));
        $row = $query->fetch();
        $status = array();
        
        if ($row){
            $status = new Status(array(
                'kayttaja_id' => $row['kayttaja_id'],
                'lukuvinkki_id' => $row['lukuvinkki_id'],
                'status' => $row['status']
            ));
            return $status;
        }
        return null;
    }
    
    public function update($id, $kayttaja_id){
        $query = DB::connection()->prepare('UPDATE Status SET kayttaja_id = :kayttaja_id, lukuvinkki_id = :lukuvinkki_id, status = :status WHERE kayttaja_id = :kayttaja_id AND lukuvinkki_id = :lukuvinkki_id');
        $query->execute(array('lukuvinkki_id' => $id, 'kayttaja_id' => $kayttaja_id, 'status' => $this->status)); 
    }

    public static function destroy($kayttaja_id, $lukuvinkki_id){
        $query = DB::connection()->prepare('DELETE FROM Status WHERE Status.kayttaja_id = :kayttaja_id AND Status.lukuvinkki_id = :lukuvinkki_id');
        $query->execute(array('kayttaja_id' => $kayttaja_id, 'lukuvinkki_id' => $lukuvinkki_id));
    }
    
    
}