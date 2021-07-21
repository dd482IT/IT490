using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class UiManager : MonoBehaviour
{

    public Text scoreDisplay;
    public Text coinDisplay;
    public Text finalCoinCountDisplay;
    public Text finalCoinDisplay;

    private int CoinScore = Player.Coins;
    private int multiplier = MenuSelector.multiplier;

    private int finalCoins;

    private int selected = MenuSelector.selected;

    void Start()
    {
        coinDisplay.text = Player.Coins.ToString();
        scoreDisplay.text = ScoreManager.score.ToString();

        finalCoins = CoinScore *= multiplier;

        switch (selected)
        {
            case 0:
                finalCoinDisplay.text = "DOGE 1x";
                finalCoinCountDisplay.text = finalCoins.ToString();
                break;
            case 1:
                finalCoinDisplay.text = "ETH  2x";
                finalCoinCountDisplay.text = finalCoins.ToString();
                break;
            case 2:
                finalCoinDisplay.text = "BTC  3x";
                finalCoinCountDisplay.text = finalCoins.ToString();
                break;
        }

    }


}
