using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class UiManager : MonoBehaviour
{

    public Text scoreDisplay;
    public Text coinDisplay;
    // Start is called before the first frame update
    void Start()
    {
        coinDisplay.text = Player.finalCoins.ToString();
        scoreDisplay.text = ScoreManager.score.ToString();
    }


}
