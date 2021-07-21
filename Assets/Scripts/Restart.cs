using UnityEngine;
using UnityEngine.SceneManagement;
using System.Collections;

public class Restart : MonoBehaviour
{

    public void RestartGame()
    {
        Player.Coins = 0;
        ScoreManager.score = 0; 
        SceneManager.LoadScene("StartMenu"); 
    }

}
