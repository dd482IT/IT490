using UnityEngine;
using UnityEngine.SceneManagement;
using System.Collections;

public class Restart : MonoBehaviour
{

    public void RestartGame()
    {
        Player.finalCoins = 0;
        ScoreManager.score = 0; 
        SceneManager.LoadScene("StartMenu"); 
    }

}
